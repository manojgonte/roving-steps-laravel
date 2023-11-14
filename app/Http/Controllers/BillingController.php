<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TourItinerary;
use App\Models\Tour;
use App\Models\invoices;
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

    public function createInvoice(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $Invoices = new invoices;
            $Invoices->bill_to = $data['bill_to'];
            $Invoices->address = $data['address'];
            $Invoices->email = $data['email'];
            $Invoices->contact_no = $data['contact_no'];
            $Invoices->tour_name = $data['tour_name'];
            $Invoices->no_of_passengers = $data['no_of_passengers'];
            $Invoices->tour_date = $data['tour_date'];
            $Invoices->invoice_date = $data['invoice_date'];

            $Invoices->save();

            // save payment in "payments" table
            foreach($data['costing'] as $key => $val) {
                $payments = new payments;
                $payments->invoice_id       = $Invoices->id;
                $payments->costing          = $data['costing'][$key];
                $payments->amount_paid      = $data['amount_paid'][$key];
                $payments->mode_of_payment  = $data['mode_of_payment'][$key];
                $payments->details          = $data['details'][$key];
                $payments->save();
            }

            return redirect('admin/invoice-dashboard/')->with('flash_message_success','New Invoices added successfully');
        }
        return view('admin.billing.create-invoice');
    }

    public function invoicePreview() {
        return view('admin.billing.invoice-preview');
    }

    public function invoiceDetails(Request $request, $id) {
        $invoice_details = invoices::with('invoicePayments')
            ->select('*')  // Use '*' to select all columns
            ->where('id', $id)
            ->first();

        return view('admin.billing.invoice-details', compact('invoice_details'));
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
        invoices::where('id',$id)->delete();
        payments::where('invoice_id',$id)->delete();
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
