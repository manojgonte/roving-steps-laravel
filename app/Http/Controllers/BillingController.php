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
    public function viewRecords() {
        $popularTours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('id','DESC')
            ->where(['status'=>1,'is_popular'=>1])
            ->take(10)
            ->get();

        $testimonials = Testimonial::orderBy('id','DESC')->take(12)->get();
        $destinations = Destination::where(['status'=>1,'is_popular'=>1])->take(8)->get();
        $invoices = invoices::orderBy('id','DESC')->take(12)->get();

        // dd("Hiiii");
        $meta_title = config('app.name');
        return view('admin.billing.invoice-dashboard',compact('meta_title','popularTours','destinations','testimonials', 'invoices'));
    }

    public function createInvoice(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $Invoices = new invoices;
            $Invoices->bill_to = $data['bill_to'];
            $Invoices->Address = $data['address'];
            $Invoices->email = $data['email'];
            $Invoices->contact_no = $data['contact_no'];
            $Invoices->tour_name = $data['tour_name'];
            $Invoices->no_of_passengers = $data['no_of_passengers'];
            $Invoices->tour_date = $data['tour_date'];
            $Invoices->invoice_date = $data['invoice_date'];

            $Invoices->amt_paid = $data['amt_paid'];
            $Invoices->grand_total = $data['grand_total'];
            $Invoices->balance = $data['balance'];
            $Invoices->amt_in_words = $data['amt_in_words'];

            $Invoices->save();

            // Get invoice id with tour name and tour date and invoice date
            $invoice_id = $Invoices->id;

            $Payments = new payments;

            // Assuming the arrays have the same length
            $count = count($data['costing']);
            $costing = $data['costing'];
            $mode_of_payment = $data['mode_of_payment'];
            $details = $data['details'];

            for ($i = 0; $i < $count; $i++) {
                payments::insert([
                    'invoice_id' => $invoice_id,
                    'costing' => $costing[$i],
                    'amount_paid' => $amount_paid[$i],
                    'mode_of_payment' => $mode_of_payment[$i],
                    'details' => $details[$i]
                ]);
            }

            return redirect('admin/invoice-dashboard/')->with('flash_message_success','New Invoices added successfully');
        }
        return view('admin.billing.create-invoice');
    }

    public function invoicePreview() {
        return view('admin.billing.invoice-preview');
    }

    public function invoiceDetails(Request $request, $id) {

        $invoice_details = invoices::select('*')  // Use '*' to select all columns
        ->where('id', $id)
        ->take(10)
        ->first();

        $payments = payments::where('invoice_id', $id)
                    ->orderBy('payment_id', 'DESC')
                    ->take(12)
                    ->get();

        return view('admin.billing.invoice-details', compact('invoice_details', 'payments'));
    }

    public function editInvoice(Request $request, $id) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            // detail update
            invoices::where('id',$id)->update([
                'bill_to'=>$data['bill_to'],
                'address'=>$data['address'],
                'costemailing'=>$data['email'],
                'costicontact_nong'=>$data['contact_no'],
                'tour_name'=>$data['tour_name'],
                'no_of_passengers'=>$data['no_of_passengers'],
                'tour_date'=>$data['tour_date'],
                'invoice_date'=>$data['invoice_date'],

                'amt_paid'=>$data['amt_paid'],
                'grand_total'=>$data['grand_total'],
                'balance'=>$data['balance'],
                'amt_in_words'=>$data['amt_in_words']
            ]);
            return redirect('admin/invoice-details/'.$id)->with('flash_message_success','Invoice details updated successfully');
        }

        $invoice_details = invoices::select('*')  // Use '*' to select all columns
        ->where('id', $id)
        ->take(10)
        ->first();

        $payments = Payments::select('*')
        ->where('invoice_id', $id)
        ->get();

        // dd($payments);
        return view('admin.billing.edit-invoice', compact('invoice_details', 'payments'));
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
        return redirect()->back()->with('flash_message_success','Invoice deleted successfully');
    }

    public function deletePayment(Request $request, $id) {
        payments::where('payment_id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Payment for invoice deleted successfully');
    }
}
