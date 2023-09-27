<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TourItinerary;
use App\Models\Tour;
use App\Models\Enquiry;
use App\Models\TourEnquiry;
use Image;
use Auth;
use Mail;
use PDF;
use Config;
use App\Services\MailchimpService;


class MailChimpController extends Controller
{


    public $mailchimp;
    // public $listId = 'd1f4e77d12';


    // public function __construct(Mailchimp $mailchimp)
    // {
    //     $this->mailchimp = $mailchimp;
    // }


    public function manageMailChimp()
    {
        // dd('hiii');
        return view('emails.mailchimp');
    }


    public function subscribe(Request $request)
    {

        $listId1 = config('app.MAILCHIMP_LIST_ID');
        dd($listId1);
		$mailchimp = new MailchimpService();
        $listId = $listId1; // Replace with your list ID

        $subject = 'Testing subject2';

        $htmlContent = View::make('emails.share_tour.blade.php')->render();
        $body = $htmlContent;

        $mailchimp->sendEmailToList($listId, $subject, $htmlContent);
    }

}
