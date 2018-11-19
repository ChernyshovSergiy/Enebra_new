<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Inf_subscriber;
use App\Mail\Information\VerifySubscriberMail;
use Illuminate\Http\Request;
use Lang;
use Mail;

class InfSubscribersController extends Controller
{
    public  function subscribe(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:inf_subscribers'
        ]);

        $subs = Inf_subscriber::add($request->get('email'));
        $subs -> generateToken();
        $subs -> setLanguage();

        Mail::to($subs)->send(new VerifySubscriberMail($subs));

        return redirect()->back()->with('status', Lang::get('mail.check_your_email'));
    }


    public function verify($token)
    {
        $subs = Inf_subscriber::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();
        return redirect('/')->with('status', Lang::get('mail.your_email_is_confirmed'));

    }
}
