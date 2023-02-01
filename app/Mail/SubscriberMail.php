<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;
    public $story;
    public $subscriber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($story,$subscriber)
    {
        $this->story= $story;
        $this->subscriber=$subscriber;
    }

    /**
     * Create a new message instance.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('mail.subscriber_mail',[
            'story'=>$this->story,
            'subscriber'=>$this->subscriber
        ]);
    }
}
