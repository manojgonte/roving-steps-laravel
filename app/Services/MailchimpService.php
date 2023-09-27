<?php
// app/Services/MailchimpService.php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpService
{
    protected $client;

    public function __construct()
    {
        $this->client = new ApiClient();
          // Get the Mailchimp API key from the .env file
          $apiKey = '455ae922a77f18258fd8858e9698a9c2-us21';

          // Extract the data center from the API key (e.g., "us6")
          $dataCenter = explode('-', $apiKey)[1];

          $this->client = new ApiClient();

          // Set the API key and data center
          $this->client->setConfig([
              'apiKey' => $apiKey,
              'server' => $dataCenter,
          ]);
    }

    public function sendEmailToList($listId, $subject, $htmlContent)
    {
        // Create the campaign
        $response = $this->client->campaigns->create([
            'type' => 'regular',
            'recipients' => [
                'list_id' => $listId,
            ],
            'settings' => [
                'subject_line' => $subject,
                'reply_to' => 'ishwarsathe67@gmail.com',
                'from_name' => 'roving steps',
            ],
        ]);

        $this->client->campaigns->setContent($response->id, [
            'html' => $htmlContent, // Set the email content
        ]);

        // $this->client->campaigns->update($response->id, [
        //     'status' => 'sendable',
        // ]);
        // Send the email
        $this->client->campaigns->send($response->id);
    }
}
