<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TourItinerary;
use App\Models\Tour;
use App\Models\invoices;
use App\Models\InvoiceItems;
use App\Models\payments;
use App\Models\Enquiry;
use App\Models\TourEnquiry;
use App\Models\Testimonial;
use App\Services\MailchimpService;
use Image;
use Auth;
use Mail;
use PDF;
use Illuminate\Support\Facades\View;

class BillingController extends Controller
{
    public function viewRecords(Request $request) {
        $invoices = invoices::with('invoicePayments')
            ->select('invoices.*','tours.tour_name as tourName')
            ->leftJoin('tours','tours.id','invoices.tour_name');

        if($request->q){
            $q = $request->q;
            $invoices = $invoices->where(function($query) use($q){
                $query->where('bill_to','like','%'.$q.'%')
                ->orWhere('contact_no','like','%'.$q.'%');
            });
        }
        $invoices = $invoices->orderBy('invoices.id','DESC')->paginate(10);
            
        $outstanding_amt = payments::select('costing','amount_paid')->get();
        return view('admin.billing.invoice-dashboard',compact('invoices','outstanding_amt'));
    }

    public function invoiceBilling(Request $request) {
        $invoices = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName')
            ->leftJoin('tours','tours.id','invoices.tour_name');

        if($request->q){
            $q = $request->q;
            $invoices = $invoices->where(function($query) use($q){
                $query->where('bill_to','like','%'.$q.'%')
                ->orWhere('contact_no','like','%'.$q.'%');
            });
        }
        $invoices = $invoices->orderBy('invoices.id','DESC')->paginate(10);
            
        $outstanding_amt = payments::select('costing','amount_paid')->get();
        return view('admin.billing.invoice-dashboard',compact('invoices','outstanding_amt'));
    }

    public function createInvoice(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            dd($data);
            $Invoices = new invoices;
            $Invoices->bill_to = $data['bill_to'];
            $Invoices->address = $data['address'];
            $Invoices->email = !empty($data['email']) ? $data['email'] : null;
            $Invoices->contact_no = $data['contact_no'];
            $Invoices->pan_no = $data['pan_no'];
            $Invoices->gst_no = $data['gst_no'];
            $Invoices->gst_address = $data['gst_address'];
            $Invoices->no_of_passengers = $data['no_of_passengers'];
            $Invoices->from_date = $data['from_date'];
            $Invoices->to_date = $data['to_date'];
            $Invoices->invoice_for = $request->invoice_for;
            $Invoices->invoice_date = $data['invoice_date'];

            $Invoices->tour_name = ($data['isTour'] == 1) ? $data['tour_name'] : null;
            $Invoices->save();

            return redirect('admin/invoice-details/'.$Invoices->id)->with('flash_message_success','Invoices created successfully');
        }
        return view('admin.billing.create-invoice');
    }

    public function invoiceActions(Request $request, $id) {
        $id = base64_decode($id);
        $invoice = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->where('invoices.id', $id)
            ->first();
        if($request->type == 'download') {
            $pdf = PDF::setOptions([
                'images' => true,
            ])->loadView('emails.share_invoice', compact('invoice'))->setPaper('a4', 'portrait');
            return $pdf->download("Invoice-".$invoice->id."-".Str::slug($invoice->bill_to)."-".date('dMY').".pdf");
        }elseif($request->type == 'share') {
            if($invoice->email) {
                $pdf = PDF::loadView('emails.share_invoice', compact('invoice'));
                $pdf = $pdf->output();
                $email = $invoice->email;
                $messageData = [
                    'invoice' => $invoice
                ];
                Mail::send('emails.share_invoice',$messageData,function($message) use($email,$pdf){
                    $message->to($email)->subject('Invoice of Booking' . ' | '. config('app.name'));
                    $message->attachData($pdf, 'invoice-'.date('dMY').'.pdf');
                });

                // update invoice sent field in db
                $inv = invoices::find($id);
                $inv->invoice_sent = 1;
                $inv->save();

                return redirect()->back()->with('flash_message_success','Invoice email sent successfully.');
            }else{
                return redirect()->back()->with('flash_message_error','Email not found for this invoice.');
            }
        }
        return redirect()->back()->with('flash_message_error','Please select invoice action.');
    }

    public function invoicePreview() {
        return view('admin.billing.invoice-preview');
    }

    public function invoiceDetails(Request $request, $id) {
        if($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            $invoice = invoices::find($id);
            $invoice->visa = $data['visa'];
            $invoice->insurance = $data['insurance'];
            $invoice->visa_appointment = $data['visa_appointment'];
            $invoice->swiss_pass = $data['swiss_pass'];
            $invoice->land_package = $data['land_package'];
            $invoice->passport_services = $data['passport_services'];
            $invoice->total = $data['total'];
            $invoice->service_charges = $data['service_charges'];
            $invoice->gst_per = $data['gst_per'];
            $invoice->gst = $data['gst'];
            $invoice->grand_total = $data['grand_total'];
            $invoice->payment_received = $data['payment_received'];
            $invoice->balance = $data['balance'];
            $invoice->note = $data['note'];
            $invoice->save();

            if(isset($data['service_name'])) {
                foreach($data['service_name'] as $key => $val) {
                    $item = new InvoiceItems;
                    $item->invoice_id       = $id;
                    $item->service_name     = $data['service_name'][$key];
                    $item->date             = $data['date'][$key];
                    $item->name             = $data['name'][$key];
                    $item->from_dest        = $data['from'][$key];
                    $item->to_dest          = $data['to'][$key];
                    $item->class            = !empty($data['class'][$key]) ? $data['class'][$key] : null;
                    $item->days             = !empty($data['days'][$key]) ? $data['days'][$key] : null;
                    $item->tourist_count    = $data['tourist_count'][$key];
                    $item->cost_person      = $data['cost_person'][$key];
                    $item->total_cost       = $data['total_cost'][$key];
                    $item->save();
                }
            }

            return redirect('admin/invoice-dashboard/')->with('flash_message_success','Invoices updated successfully');
        }

        $invoice = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->where('invoices.id', $id)
            ->first();
        if(count($invoice->invoiceItems)) {
            return view('admin.billing.invoice', compact('invoice'));
        }
        return view('admin.billing.invoice-details', compact('invoice'));
    }

    public function editInvoice(Request $request) {
        $data = $request->all();

        // detail update
        invoices::where('id',$request->invoice_id)->update([
            'bill_to'=>$data['bill_to'],
            'address'=>$data['address'],
            'email'=>$data['email'],
            'contact_no'=>$data['contact_no'],
            'tour_name'=>$data['tour_name'],
            'no_of_passengers'=>$data['no_of_passengers'],
            'tour_date'=>$data['tour_date'],
            'invoice_date'=>$data['invoice_date']
        ]);
        return redirect()->back()->with('flash_message_success','Invoice details updated successfully');
    }

    public function editPayment(Request $request, $id) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            // detail update
            payments::where('id',$id)->update([
                'costing'=>$data['costing'],
                'mode_of_payment'=>$data['mode_of_payment'],
                'details'=>$data['details'],
                'amount_paid'=>$data['amount_paid'],
                'updated_at'=>$data['costing']
            ]);
            return redirect('admin/edit-payment/'.$id)->with('flash_message_success','Payment details updated successfully');
        }

        $payments = payments::select('*')
            ->where('invoice_id', $id)
            ->first();

        return view('admin.billing.edit-invoice', compact('payments'));
    }

    public function deleteInvoice(Request $request, $id) {
        invoices::where('id',base64_decode($id))->delete();
        return redirect()->back()->with('flash_message_success','Invoice deleted successfully');
    }

    public function deleteInvoicePayment(Request $request, $id) {
        payments::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Payment for invoice deleted successfully');
    }

    public function getInvoiceDetails(Request $request){
        $id = $request->input('id');
        $invoices = invoices::select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->first();
        return response()->json($invoices);
    }

    public function getPayDetails(Request $request){
        $id = $request->input('id');
        $payment = payments::find($id);
        return response()->json($payment);
    }

    public function updatePayDetails(Request $request){
        $payment = payments::where('id', $request->payment_id)
            ->update([
                'details'=>$request->details,
                'costing'=>$request->costing,
                'amount_paid'=>$request->amount_paid,
                'mode_of_payment'=>$request->mode_of_payment
            ]);
        return redirect()->back()->with('flash_message_success','Payment details updated successfully');
    }

    public function addInvoicePayment(Request $request){
        $data = $request->all();
            // dd($data);
            $pay = new payments;
            $pay->invoice_id    = $data['invoice_id'];
            $pay->details       = $data['details'];
            $pay->costing       = $data['costing'];
            $pay->amount_paid   = $data['amount_paid'];
            $pay->mode_of_payment = $data['mode_of_payment'];
            $pay->save();
        return redirect()->back()->with('flash_message_success','Payment added successfully');
    }
}
