<?php

namespace App\Mail;

use App;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $emailRecipients = config('matcha.mail_recipients.publish.' . App::environment());
        $actionUrl = url('campaign/'. $this->data['campaign']['id'] .'/publish');


        return $this->to($emailRecipients)
            ->subject($this->data['subject'])
            ->markdown('emails.campaign-confirm-go-live')
            ->with('data', $this->data)
            ->with('actionUrl', $actionUrl);
    }
}
