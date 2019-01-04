<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WhatToDoPoints\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\WhatToDoPoint;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WhatToDoPointsController extends Controller
{
    public $model;
    public $json;
    public $pageName;
    public $languages;

    public function __construct(
        WhatToDoPoint $introduction_point,
        JsonService $jsonService,
        PagesService $page,
        LanguagesService $languagesService
    )
    {
        $this->model = $introduction_point;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $points = $this->json->build($this->model, 'point');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.what_to_do_points.index',
            compact('points', 'locale'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.what_to_do_points.create',
            compact('page_names','languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addPoint($request);

        return redirect()->route('what_to_do_points.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $point = $this->json->build($this->model, 'point')->find($id);
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.what_to_do_points.edit',
            compact('point','languages','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editPoint($request, $id);

        return redirect()->route('what_to_do_points.index');
    }

    public function destroy($id)
    {
        $this->model->removePoint($id);

        return redirect()->route('what_to_do_points.index');
    }
}
