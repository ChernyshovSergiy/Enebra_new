<?php

namespace App\Http\Controllers\Admin;

use App\Const_section;
use App\Http\Requests\Admin\ConstSections\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ConstSectionController extends Controller
{
    public $model;
    public $json;
    public $pageName;
    public $languages;

    public function __construct(
        Const_section $const_section,
        JsonService $jsonService,
        PagesService $page,
        LanguagesService $languagesService
    )
    {
        $this->model = $const_section;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $sections = $this->json->build($this->model, 'title');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.const_sections.index',
            compact('sections', 'locale'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.const_sections.create',
            compact('page_names','languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addSection($request);

        return redirect()->route('const_sections.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $section = $this->json->build($this->model, 'title')->find($id);
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.const_sections.edit',
            compact('section','languages','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editSection($request, $id);

        return redirect()->route('const_sections.index');
    }

    public function destroy($id)
    {
        $this->model->removeSection($id);

        return redirect()->route('const_sections.index');
    }
}
