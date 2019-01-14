<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subscribers\ValidateRequest;
use App\Inf_subscriber;
use App\Mail\Information\VerifySubscriberMail;
use Lang;
use Mail;

class InfSubscribersController extends Controller
{
    public $model;

    public function __construct(Inf_subscriber $subscriber)
    {
        $this->model = $subscriber;
    }

    public  function subscribe(ValidateRequest $request)
    {
        $subs = $this->model::add($request->get('email'));
        $subs -> generateToken();
        $subs -> setLanguage();

        Mail::to($subs)->send(new VerifySubscriberMail($subs));
//        Mail::to($subs)->queue(new VerifySubscriberMail($subs));

        return redirect()->back()->with('status', Lang::get('mail.check_your_email'));
    }


    public function verify($token)
    {
        $subs = $this->model::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();
        return redirect('/')->with('status', Lang::get('mail.your_email_is_confirmed'));

    }
}
