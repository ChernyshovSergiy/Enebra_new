<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Inf_subscriber;
use App\Language;
use App\Mail\Information\VerifySubscriberMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class SubscribersController extends Controller
{
    public function index()
    {
        $subs = Inf_subscriber::all()->sortByDesc('updated_at');
        return view('admin.subscribers.index', compact('subs'));
    }

    public function create()
    {
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'title', 'id')->all();
        return view('admin.subscribers.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:inf_subscribers'
        ]);
        $subs = Inf_subscriber::create($request->all());
        $subs->setUserLanguage($request->get('language_id'));
        if($request->get('token') != null){
            $subs->generateToken();
            App::setLocale(Inf_subscriber::setSlugLanguage($request->get('language_id')));

            Mail::to($subs)->send(new VerifySubscriberMail($subs));
        }

        return redirect()->route('subscribers.index');
    }

    public function show(Inf_subscriber $inf_subscriber)
    {
        //
    }

    public function edit(Inf_subscriber $inf_subscriber)
    {
        //
    }

    public function update(Request $request, Inf_subscriber $inf_subscriber)
    {
        //
    }

    public function destroy($id)
    {
        Inf_subscriber::find($id)->remove();
        return redirect()->route('subscribers.index');
    }
}
