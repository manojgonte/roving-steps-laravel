<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterCampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $htmlBody;
    public $emailSubject;

    public function __construct(string $subject, string $htmlBody)
    {
        $this->emailSubject = $subject;
        $this->htmlBody = $htmlBody;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject($this->emailSubject)
                    ->view('emails.newsletter_campaign')
                    ->with(['htmlBody' => $this->htmlBody]);
    }
}
