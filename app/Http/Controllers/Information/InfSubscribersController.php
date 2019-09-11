<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subscribers\ValidateRequest;
use App\Models\Inf_subscriber;
use Lang;

class InfSubscribersController extends Controller
{
    public $model;

    public function __construct(Inf_subscriber $subscriber)
    {
        $this->model = $subscriber;
    }

    public  function subscribe(ValidateRequest $request)
    {
        $this->model->addSubs($request);

        return redirect()->back()->with('status', Lang::get('mail.check_your_email'));
    }

    public function verify($token)
    {
        $this->model->verifySuds($token);

        return redirect('/')->with('status', Lang::get('mail.your_email_is_confirmed'));
    }
}
