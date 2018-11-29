<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\Admin\Countries\ValidateRequest;
use App\Inf_id_document;
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
        Inf_id_document $id_document,
        LanguagesService $language,
        ImagesService $imagesService
    )
    {
        $this->json = $jsonService;
        $this->model = $id_document;
        $this->language = $language;
        $this->images = $imagesService;
    }

    public function index()
    {
        $countries = Country::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        $language = $this->language->getLanguages();
        $flag_image = $this->images->getImageNameByCategory(1);
        $id_documents = (new \App\Country)->getIdDocNameByCurrentLocale();

        return view('admin.countries.create', compact(
            'language', 'flag_image', 'id_documents'));
    }

    public function store(ValidateRequest $request)
    {
        Country::addCountry($request);

        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        $language = $this->language->getLanguages();
        $flag_image = $this->images->getImageNameByCategory(1);
        $id_documents = (new \App\Country)->getIdDocNameByCurrentLocale();

        return view('admin.countries.edit', compact(
            'country','language', 'flag_image', 'id_documents'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $country = Country::find($id);
        $country ->editCountry($request);

        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        Country::find($id)->removeCountry();
        return redirect()->route('countries.index');
    }
}
