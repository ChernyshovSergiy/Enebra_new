<?php

namespace App\Mail\Information;

use App\Models\Inf_subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lang;

class VerifySubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subs;

    public function __construct(Inf_subscriber $subscriber)
    {
        $this->subs = $subscriber;
    }

    public function build()
    {
        return $this
            ->subject(Lang::get('mail.signup_subscriber'))
            ->markdown('emails.subscriber.verify');
    }
}
