<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterEmail;
use App\Models\NewsletterTemplate;
use App\Models\NewsletterCampaign;
use App\Models\User;
use App\Jobs\SendNewsletterEmailJob;
use Session;

class NewsController extends Controller
{
    // ─── Subscribers ───────────────────────────────────────────

    public function viewSubscribers(Request $request)
    {
        $emails = NewsletterEmail::orderBy('id', 'DESC');

        if ($request->q) {
            $q = $request->q;
            $emails = $emails->where(function ($query) use ($q) {
                $query->where('email', 'like', '%' . $q . '%')
                    ->orWhere('id', 'like', '%' . $q . '%');
            });
        }

        $emails = $emails->paginate(10);
        return view('admin.newsletter.subscribers')->with(compact('emails'));
    }

    public function deleteSubscriber(Request $request, $id)
    {
        NewsletterEmail::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Subscriber deleted successfully');
    }

    // ─── Unsubscribe (public) ──────────────────────────────────

    public function unsubscribe($token)
    {
        $subscriber = NewsletterEmail::where('unsubscribe_token', $token)->first();

        if (!$subscriber) {
            return view('newsletter.unsubscribed')->with('error', true);
        }

        $subscriber->update(['status' => 0]);

        return view('newsletter.unsubscribed')->with('error', false);
    }

    // ─── Templates CRUD ────────────────────────────────────────

    public function viewTemplates(Request $request)
    {
        $templates = NewsletterTemplate::orderBy('id', 'DESC');

        if ($request->q) {
            $q = $request->q;
            $templates = $templates->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('subject', 'like', '%' . $q . '%');
            });
        }

        $templates = $templates->paginate(10);
        return view('admin.newsletter.templates')->with(compact('templates'));
    }

    public function createTemplate()
    {
        return view('admin.newsletter.template_form')->with(['template' => null]);
    }

    public function storeTemplate(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body'    => 'required|string',
        ]);

        NewsletterTemplate::create($request->only('name', 'subject', 'body'));

        return redirect('admin/newsletter-templates')->with('flash_message_success', 'Template created successfully');
    }

    public function editTemplate($id)
    {
        $template = NewsletterTemplate::findOrFail($id);
        return view('admin.newsletter.template_form')->with(compact('template'));
    }

    public function updateTemplate(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body'    => 'required|string',
        ]);

        $template = NewsletterTemplate::findOrFail($id);
        $template->update($request->only('name', 'subject', 'body'));

        return redirect('admin/newsletter-templates')->with('flash_message_success', 'Template updated successfully');
    }

    public function deleteTemplate($id)
    {
        NewsletterTemplate::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Template deleted successfully');
    }

    public function previewTemplate($id)
    {
        $template = NewsletterTemplate::findOrFail($id);

        $html = $this->replacePlaceholders($template->body, [
            'name'             => 'John Doe',
            'email'            => 'john@example.com',
            'unsubscribe_url'  => url('/newsletter/unsubscribe/sample-token'),
        ]);

        return response($html);
    }

    // ─── Compose & Send ────────────────────────────────────────

    public function viewCompose()
    {
        $templates = NewsletterTemplate::orderBy('name')->get();

        $counts = [
            'users'       => User::whereNotNull('email')->count(),
            'subscribers' => NewsletterEmail::where('status', 1)->count(),
        ];

        return view('admin.newsletter.compose')->with(compact('templates', 'counts'));
    }

    public function sendCampaign(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'subject'        => 'required|string|max:255',
            'body'           => 'required|string',
            'recipient_type' => 'required|in:users,subscribers,both',
        ]);

        $recipients = $this->getRecipientsByType(
            $request->recipient_type,
            $request->boolean('upcoming_birthday'),
            $request->boolean('upcoming_anniversary')
        );

        if ($recipients->isEmpty()) {
            return redirect()->back()
                ->withInput()
                ->with('flash_message_error', 'No recipients found for the selected type.');
        }

        $campaign = NewsletterCampaign::create([
            'name'             => $request->name,
            'subject'          => $request->subject,
            'body'             => $request->body,
            'recipient_type'   => $request->recipient_type,
            'total_recipients' => $recipients->count(),
            'sent_count'       => 0,
            'failed_count'     => 0,
            'status'           => 'queued',
        ]);

        foreach ($recipients as $recipient) {
            $personalizedBody = $this->replacePlaceholders($request->body, [
                'name'            => $recipient['name'] ?? '',
                'email'           => $recipient['email'],
                'unsubscribe_url' => $recipient['unsubscribe_url'],
            ]);

            SendNewsletterEmailJob::dispatch(
                $recipient['email'],
                $recipient['name'] ?? null,
                $request->subject,
                $personalizedBody,
                $campaign->id
            );
        }

        return redirect('admin/newsletter-campaigns')
            ->with('flash_message_success', "Campaign \"{$campaign->name}\" queued for {$recipients->count()} recipients.");
    }

    public function loadTemplate(Request $request)
    {
        $template = NewsletterTemplate::find($request->id);
        if (!$template) {
            return response()->json(['status' => false]);
        }
        return response()->json([
            'status'  => true,
            'subject' => $template->subject,
            'body'    => $template->body,
        ]);
    }

    // ─── Campaigns ─────────────────────────────────────────────

    public function viewCampaigns(Request $request)
    {
        $campaigns = NewsletterCampaign::orderBy('id', 'DESC');

        if ($request->q) {
            $q = $request->q;
            $campaigns = $campaigns->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('subject', 'like', '%' . $q . '%');
            });
        }

        $campaigns = $campaigns->paginate(10);
        return view('admin.newsletter.campaigns')->with(compact('campaigns'));
    }

    public function showCampaign($id)
    {
        $campaign = NewsletterCampaign::findOrFail($id);
        return view('admin.newsletter.campaign_detail')->with(compact('campaign'));
    }

    // ─── SendGrid Webhook ──────────────────────────────────────

    public function sendgridWebhook(Request $request)
    {
        $events = $request->all();

        if (!is_array($events)) {
            return response('OK', 200);
        }

        foreach ($events as $event) {
            if (!isset($event['event']) || !isset($event['email'])) {
                continue;
            }

            $type = $event['event'];
            $email = $event['email'];

            if (in_array($type, ['bounce', 'dropped', 'spamreport'])) {
                NewsletterEmail::where('email', $email)->update(['status' => 0]);
            }
        }

        return response('OK', 200);
    }

    // ─── Helpers ───────────────────────────────────────────────

    /**
     * Build a unified recipient list based on type.
     * Each item: ['email' => ..., 'name' => ..., 'unsubscribe_url' => ...]
     * Extensible: add 'vendors' case when that table exists.
     */
    protected function getRecipientsByType(string $type, bool $upcomingBirthday = false, bool $upcomingAnniversary = false)
    {
        $recipients = collect();

        if (in_array($type, ['users', 'both'])) {
            $query = User::whereNotNull('email')->where('email', '!=', '');

            if ($upcomingBirthday || $upcomingAnniversary) {
                $today  = now()->format('m-d');
                $future = now()->addMonths(3)->format('m-d');

                $query->where(function ($q) use ($upcomingBirthday, $upcomingAnniversary, $today, $future) {
                    if ($upcomingBirthday) {
                        $q->orWhere(function ($sub) use ($today, $future) {
                            $sub->whereNotNull('dob');
                            if ($today <= $future) {
                                $sub->whereRaw("DATE_FORMAT(dob, '%m-%d') BETWEEN ? AND ?", [$today, $future]);
                            } else {
                                $sub->where(function ($wrap) use ($today, $future) {
                                    $wrap->whereRaw("DATE_FORMAT(dob, '%m-%d') >= ?", [$today])
                                         ->orWhereRaw("DATE_FORMAT(dob, '%m-%d') <= ?", [$future]);
                                });
                            }
                        });
                    }
                    if ($upcomingAnniversary) {
                        $q->orWhere(function ($sub) use ($today, $future) {
                            $sub->whereNotNull('anniversary_date');
                            if ($today <= $future) {
                                $sub->whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') BETWEEN ? AND ?", [$today, $future]);
                            } else {
                                $sub->where(function ($wrap) use ($today, $future) {
                                    $wrap->whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') >= ?", [$today])
                                         ->orWhereRaw("DATE_FORMAT(anniversary_date, '%m-%d') <= ?", [$future]);
                                });
                            }
                        });
                    }
                });
            }

            $users = $query->get(['email', 'name']);

            foreach ($users as $user) {
                $recipients->push([
                    'email'           => $user->email,
                    'name'            => $user->name,
                    'unsubscribe_url' => '',
                ]);
            }
        }

        if (in_array($type, ['subscribers', 'both'])) {
            $subscribers = NewsletterEmail::where('status', 1)->get();

            foreach ($subscribers as $sub) {
                $recipients->push([
                    'email'           => $sub->email,
                    'name'            => null,
                    'unsubscribe_url' => url('/newsletter/unsubscribe/' . $sub->unsubscribe_token),
                ]);
            }
        }

        // Future: vendors
        // if (in_array($type, ['vendors', 'both'])) { ... }

        return $recipients->unique('email')->values();
    }

    protected function replacePlaceholders(string $html, array $data): string
    {
        $replacements = [
            '{{name}}'            => $data['name'] ?? '',
            '{{email}}'           => $data['email'] ?? '',
            '{{unsubscribe_url}}' => $data['unsubscribe_url'] ?? '#',
            '{{ name }}'            => $data['name'] ?? '',
            '{{ email }}'           => $data['email'] ?? '',
            '{{ unsubscribe_url }}' => $data['unsubscribe_url'] ?? '#',
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $html);
    }
}
