<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Requests\Admin\Countries\ValidateRequest;
use App\Services\ImagesService;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{

    public $json;
    public $model;
    public $language;
    public $images;

    public function __construct(
        JsonService $jsonService,
        Country $country,
        LanguagesService $language,
        ImagesService $imagesService
    )
    {
        $this->json = $jsonService;
        $this->model = $country;
        $this->language = $language;
        $this->images = $imagesService;
    }

    public function index()
    {
        $countries = $this->model::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        $language = $this->language->getLanguages();
        $flag_image = $this->images->getImageNameByCategory(1);
        $id_documents = $this->model->getIdDocNameByCurrentLocale();

        return view('admin.countries.create', compact(
            'language', 'flag_image', 'id_documents'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addCountry($request);

        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = $this->model::find($id);
        $language = $this->language->getLanguages();
        $flag_image = $this->images->getImageNameByCategory(1);
        $id_documents = $this->model->getIdDocNameByCurrentLocale();

        return view('admin.countries.edit', compact(
            'country','language', 'flag_image', 'id_documents'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editCountry($request, $id);

        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        $this->model->removeCountry($id);

        return redirect()->route('countries.index');
    }
}
