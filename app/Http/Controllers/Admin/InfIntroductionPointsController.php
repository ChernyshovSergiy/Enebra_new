<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfIntroductionPoints\ValidateRequest;
use App\Inf_introduction_point;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfIntroductionPointsController extends Controller
{
    public $model;
    public $json;
    public $languages;
    public $linkName;

    public function __construct(
        Inf_introduction_point $introduction_point,
        JsonService $jsonService,
        PagesService $pagesService,
        LanguagesService $languagesService
    )
    {
        $this->model = $introduction_point;
        $this->json = $jsonService;
        $this->linkName = $pagesService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $inf_intr_points = $this->json->build($this->model, 'point');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_int_points.index', compact('inf_intr_points', 'locale'));
    }

    public function create()
    {
        $page_names = $this->linkName->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_int_points.create', compact('languages', 'page_names'));
    }

    public function store(ValidateRequest $request)
    {
        Inf_introduction_point::addPoint($request);

        return redirect()->route('introduction_points.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $inf_intr_point = $this->json->build($this->model, 'point')->find($id);
        $page_names = $this->linkName->getActivePagesName();

        return view('admin.inf_int_points.edit', compact('inf_intr_point','languages','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        Inf_introduction_point::editPoint($request, $id);

        return redirect()->route('introduction_points.index');
    }

    public function destroy($id)
    {
        Inf_introduction_point::removePoint($id);
        return redirect()->route('introduction_points.index');
    }
}
