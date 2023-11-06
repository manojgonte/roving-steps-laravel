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
                    'mode_of_payment' => $mode_of_payment[$i],
                    'details' => $details[$i],
                ]);
            }

            return redirect('admin/invoice-dashboard/')->with('flash_message_success','New Invoices added successfully');
        }
        return view('admin.billing.create-invoice');
    }

    public function invoicePreview() {
        return view('admin.billing.invoice-preview');
    }


}
