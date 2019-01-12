<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Languages\ValidateRequest;
use App\Language;
use App\Services\ImagesService;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    public $model;
    public $images;

    public function __construct(
        Language $language,
        ImagesService $imagesService)
    {
        $this->model = $language;
        $this->images = $imagesService;
    }

    public function index()
    {
        $languages = $this->model::all();

        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        $flag_image = $this->images->getImageNameByCategory(1);

        return view('admin.languages.create', compact('flag_image'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addNewLanguage($request);

        return redirect()->route('languages.index');
    }

    public function edit($id)
    {
        $language = $this->model::find($id);
        $flag_image = $this->images->getImageNameByCategory(1);

        return view('admin.languages.edit',
            compact('language', 'flag_image'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editLanguage($request, $id);

        return redirect()->route('languages.index');
    }

    public function destroy($id)
    {
        $this->model->removeLanguage($id);

        return redirect()->route('languages.index');
    }

    public function toggle($id)
    {
        $this->model->toggleActive($id);

        return redirect()->back();
    }
}
