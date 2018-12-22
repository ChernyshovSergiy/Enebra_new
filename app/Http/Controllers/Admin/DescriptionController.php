<?php

namespace App\Http\Controllers\Admin;

use App\Description;
use App\Http\Requests\Admin\Description\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DescriptionController extends Controller
{

    public $model;
    public $json;
    public $pageName;
    public $languages;

    public function __construct(
        Description $description_blocks,
        JsonService $jsonService,
        PagesService $page,
        LanguagesService $languagesService
    )
    {
        $this->model = $description_blocks;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $descriptions = $this->json->build($this->model, 'text_block');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.descriptions.index',
            compact('descriptions', 'locale'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.descriptions.create',
            compact('page_names','languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addTextBlock($request);

        return redirect()->route('descriptions.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $description = $this->json->build($this->model, 'text_block')->find($id);
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.descriptions.edit',
            compact('description','languages','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editTextBlock($request, $id);

        return redirect()->route('descriptions.index');
    }

    public function destroy($id)
    {
        $this->model->removeTextBlock($id);

        return redirect()->route('descriptions.index');
    }
}
