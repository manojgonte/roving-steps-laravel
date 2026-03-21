<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterCampaignMail;
use App\Models\NewsletterCampaign;

class SendNewsletterEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = 60;

    protected $recipientEmail;
    protected $recipientName;
    protected $emailSubject;
    protected $htmlBody;
    protected $campaignId;

    public function __construct(
        string $recipientEmail,
        ?string $recipientName,
        string $emailSubject,
        string $htmlBody,
        int $campaignId
    ) {
        $this->recipientEmail = $recipientEmail;
        $this->recipientName = $recipientName;
        $this->emailSubject = $emailSubject;
        $this->htmlBody = $htmlBody;
        $this->campaignId = $campaignId;
    }

    public function handle()
    {
        $mailable = new NewsletterCampaignMail($this->emailSubject, $this->htmlBody);

        if ($this->recipientName) {
            Mail::to([['email' => $this->recipientEmail, 'name' => $this->recipientName]])
                ->send($mailable);
        } else {
            Mail::to($this->recipientEmail)->send($mailable);
        }

        NewsletterCampaign::where('id', $this->campaignId)->increment('sent_count');
    }

    public function failed(\Throwable $exception)
    {
        NewsletterCampaign::where('id', $this->campaignId)->increment('failed_count');
    }
}
