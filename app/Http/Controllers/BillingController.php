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
            
        return view('admin.billing.invoice-dashboard',compact('invoices'));
    }

    public function createInvoice(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $Invoices = new invoices;
            $Invoices->bill_to = $data['bill_to'];
            $Invoices->address = !empty($data['address']) ? $data['address'] : null;
            $Invoices->email = !empty($data['email']) ? $data['email'] : null;
            $Invoices->contact_no = !empty($data['contact_no']) ? $data['contact_no'] : null;
            $Invoices->pan_no = !empty($data['pan_no']) ? $data['pan_no'] : null;
            $Invoices->gst_no = !empty($data['gst_no']) ? $data['gst_no'] : null;
            $Invoices->gst_address = !empty($data['gst_address']) ? $data['gst_address'] : null;
            $Invoices->no_of_passengers = !empty($data['no_of_passengers']) ? $data['no_of_passengers'] : null;
            $Invoices->from_date = !empty($data['from_date']) ? $data['from_date'] : null;
            $Invoices->to_date = !empty($data['to_date']) ? $data['to_date'] : null;
            $Invoices->invoice_for = $request->invoice_for;
            $Invoices->invoice_date = $data['invoice_date'];

            $Invoices->tour_name = !empty($data['isTour']) ? $data['tour_name'] : null;
            $Invoices->save();

            return redirect('admin/invoice-details/'.base64_encode($Invoices->id))->with('flash_message_success','Invoice generated successfully, please update the services amount.');
        }
        return view('admin.billing.create-invoice');
    }

    public function invoiceActions(Request $request, $id) {
        $id = base64_decode($id);
        $invoice = invoices::with('invoiceItems','invoicePayments')
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
            if($request->email) {
                $pdf = PDF::loadView('emails.share_invoice', compact('invoice'));
                $pdf = $pdf->output();
                $email = $request->email;
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
        $id = base64_decode($id);
        if($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            $invoice = invoices::find($id);
            $invoice->visa = !empty($data['visa']) ? $data['visa'] : null;
            $invoice->insurance = $data['insurance'];
            $invoice->visa_appointment = $data['visa_appointment'];
            $invoice->swiss_pass = $data['swiss_pass'];
            $invoice->land_package = $data['land_package'];
            $invoice->passport_services = !empty($data['passport_services']) ? $data['passport_services'] : null;
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
                    $item->from_dest        = !empty($data['from'][$key]) ? $data['from'][$key] : null;
                    $item->to_dest          = !empty($data['to'][$key]) ? $data['to'][$key] : null;
                    $item->class            = !empty($data['class'][$key]) ? $data['class'][$key] : null;
                    $item->days             = !empty($data['days'][$key]) ? $data['days'][$key] : null;
                    $item->tourist_count    = $data['tourist_count'][$key];
                    $item->cost_person      = $data['cost_person'][$key];
                    $item->total_cost       = $data['total_cost'][$key];
                    $item->save();
                }
            }

            if(!empty($data['payment_received']) && $data['payment_received'] != 0) {
                $pay = new payments;
                $pay->invoice_id    = $invoice->id;
                $pay->payment_date  = date('Y-m-d');
                $pay->amount        = $data['payment_received'];
                $pay->payment_mode  = !empty($data['payment_mode']) ? $data['payment_mode'] : null;
                $pay->save();
            }

            return redirect('admin/invoice-billing/')->with('flash_message_success','Invoices updated successfully');
        }

        $invoice = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->where('invoices.id', $id)
            ->first();
        if(count($invoice->invoiceItems) > 0) {
            return view('admin.billing.invoice', compact('invoice'));
        }
        return view('admin.billing.invoice-details', compact('invoice'));
    }

    public function editInvoice(Request $request,$id) {
        $id = base64_decode($id);
        if($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $Invoices = invoices::find($id);
            $Invoices->bill_to = $data['bill_to'];
            $Invoices->address = !empty($data['address']) ? $data['address'] : null;
            $Invoices->email = !empty($data['email']) ? $data['email'] : null;
            $Invoices->contact_no = !empty($data['contact_no']) ? $data['contact_no'] : null;
            $Invoices->pan_no = !empty($data['pan_no']) ? $data['pan_no'] : null;
            $Invoices->gst_no = !empty($data['gst_no']) ? $data['gst_no'] : null;
            $Invoices->gst_address = !empty($data['gst_address']) ? $data['gst_address'] : null;
            $Invoices->no_of_passengers = !empty($data['no_of_passengers']) ? $data['no_of_passengers'] : null;
            $Invoices->from_date = !empty($data['from_date']) ? $data['from_date'] : null;
            $Invoices->to_date = !empty($data['to_date']) ? $data['to_date'] : null;
            $Invoices->invoice_date = $data['invoice_date'];
            $Invoices->tour_name = !empty($data['isTour']) ? $data['tour_name'] : null;

            if(isset($request->invoice_for)){
                $Invoices->invoice_for = $request->invoice_for;
            }
            $Invoices->save();

            // return redirect('admin/invoice-details/'.$Invoices->id)->with('flash_message_success','Invoice updated successfully');
            return redirect()->back()->with('flash_message_success','Invoice details updated successfully');
        }
        $invoice = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->where('invoices.id', $id)
            ->first();
        return view('admin.billing.edit-invoice', compact('invoice'));
    }

    public function editInvoiceDetails(Request $request,$id) {
        $id = base64_decode($id);
        if($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            $invoice = invoices::find($id);
            $invoice->visa = !empty($data['visa']) ? $data['visa'] : null;
            $invoice->insurance = $data['insurance'];
            $invoice->visa_appointment = $data['visa_appointment'];
            $invoice->swiss_pass = $data['swiss_pass'];
            $invoice->land_package = $data['land_package'];
            $invoice->passport_services = !empty($data['passport_services']) ? $data['passport_services'] : null;
            $invoice->total = $data['total'];
            $invoice->service_charges = $data['service_charges'];
            $invoice->gst_per = $data['gst_per'];
            $invoice->gst = $data['gst'];
            $invoice->grand_total = $data['grand_total'];
            $invoice->payment_received = $data['payment_received'];
            $invoice->balance = $data['balance'];
            $invoice->note = $data['note'];
            $invoice->save();

            //delete previously added invoice item and adding fresh items
            InvoiceItems::where('invoice_id',$id)->delete();

            if(isset($data['service_name'])) {
                foreach($data['service_name'] as $key => $val) {
                    $item = new InvoiceItems;
                    $item->invoice_id       = $id;
                    $item->service_name     = $data['service_name'][$key];
                    $item->date             = !empty($data['date'][$key]) ? $data['date'][$key] : null;
                    $item->name             = $data['name'][$key];
                    $item->from_dest        = !empty($data['from'][$key]) ? $data['from'][$key] : null;
                    $item->to_dest          = !empty($data['to'][$key]) ? $data['to'][$key] : null;
                    $item->class            = !empty($data['class'][$key]) ? $data['class'][$key] : null;
                    $item->days             = !empty($data['days'][$key]) ? $data['days'][$key] : null;
                    $item->tourist_count    = $data['tourist_count'][$key];
                    $item->cost_person      = $data['cost_person'][$key];
                    $item->total_cost       = $data['total_cost'][$key];
                    $item->save();
                }
            }

            return redirect('admin/invoice-details/'.base64_encode($id))->with('flash_message_success','Invoice details updated successfully');
        }
        $invoice = invoices::with('invoiceItems')
            ->select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->where('invoices.id', $id)
            ->first();
        if(count($invoice->invoiceItems) <= 0) {
            return view('admin.billing.invoice-details', compact('invoice'));
        }
        return view('admin.billing.edit_invoice_details', compact('invoice'));
    }

    public function deleteInvoice(Request $request, $id) {
        invoices::where('id',base64_decode($id))->delete();
        return redirect()->back()->with('flash_message_success','Invoice deleted successfully');
    }

    public function getInvoiceDetails(Request $request){
        $id = $request->input('id');
        $invoices = invoices::select('invoices.*','tours.tour_name as tourName','invoices.tour_name as tour_id')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->first();
        return response()->json($invoices);
    }

    public function invoicePayments(Request $request, $id) {
        $invoice = invoices::with('invoicePayments')
            ->select('invoices.*','tours.tour_name as tourName')
            ->leftJoin('tours','tours.id','invoices.tour_name')
            ->orderBy('invoices.id','DESC')
            ->where('invoices.id',base64_decode($id))
            ->first();
            
        return view('admin.billing.invoice_payments',compact('invoice'));
    }

    public function addInvoicePayment(Request $request, $id){
        $id = base64_decode($id);
        if($request->isMethod('post')){
            $data = $request->all();
            
            $pay = new payments;
            $pay->invoice_id    = $id;
            $pay->payment_date  = $data['payment_date'];
            $pay->amount        = $data['amount'];
            $pay->payment_mode  = $data['payment_mode'];
            $pay->save();

            // update received payment in invoice table
            $invoice = invoices::select('grand_total','payment_received','balance')->find($id);
            $payment_received = $invoice->payment_received + $data['amount'];
            $balance = $invoice->balance - $data['amount'];
            invoices::where('id',$id)->update(['payment_received'=>$payment_received,'balance'=>$balance]);

            return redirect()->back()->with('flash_message_success','Payment added successfully');
        }
    }

    public function updatePayDetails(Request $request, $id){
        $payment = payments::where('id',base64_decode($id))->first();
        if($request->isMethod('post')){
            $data = $request->all();
            payments::where('id', base64_decode($id))
                ->update([
                    'payment_date'=>$request->payment_date,
                    'amount'=>$request->amount,
                    'payment_mode'=>$request->payment_mode
                ]);
            return redirect('admin/invoice-payments/'.base64_encode($payment->invoice_id))->with('flash_message_success','Payment details updated successfully');
        }
        return view('admin.billing.edit_invoice_payment',compact('payment'));
    }

    public function deleteInvoicePayment(Request $request, $id) {
        $id = base64_decode($id);
        // update received payment in invoice table
        $payment = payments::find($id);
        $invoice = invoices::select('grand_total','payment_received','balance')->find($payment->invoice_id);
        $payment_received = $invoice->payment_received - $payment->amount;
        $balance = $invoice->balance + $payment->amount;
        invoices::where('id',$payment->invoice_id)->update(['payment_received'=>$payment_received,'balance'=>$balance]);

        //delete payment
        payments::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Payment for invoice deleted successfully');
    }
}
