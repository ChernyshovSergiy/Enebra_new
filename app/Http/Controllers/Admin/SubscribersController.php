<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Requests\Admin\Subscribers\ValidateRequest;
use App\Models\Inf_subscriber;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    public $model;
    public $languages;

    public function __construct(
        Inf_subscriber $subscriber,
        LanguagesService $languagesService
    )
    {
        $this->model = $subscriber;
        $this->languages = $languagesService;
    }

    public function index()
    {
        $subs = $this->model::all()->sortByDesc('updated_at');

        return view('admin.subscribers.index', compact('subs'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();

        return view('admin.subscribers.create', compact('languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model::addSubscriber($request);

        return redirect()->route('subscribers.index');
    }

    public function destroy($id)
    {

        $this->model->removeSubscriber($id);

        return redirect()->route('subscribers.index');
    }
}
