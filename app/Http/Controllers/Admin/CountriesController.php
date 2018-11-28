<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Image;
use App\Inf_id_document;
use App\Language;
use App\Services\JsonService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountriesController extends Controller
{

    public $json;
    public $model;

    public function __construct( JsonService $jsonService, Inf_id_document $id_document)
    {

        $this->json = $jsonService;
        $this->model = $id_document;

    }

    public function index()
    {
        $countries = Country::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();
        $flag_image = Image::where( 'category_id','=', 1 )->pluck('title', 'id');
        $locale = LaravelLocalization::getCurrentLocale();
        $doc_names = $this->json->build($this->model, 'name')->pluck('name', 'id');
        foreach($doc_names as $key => $title){
            $id_documents[$key] = $title->$locale;
        };
        return view('admin.countries.create', compact('language', 'flag_image', 'id_documents'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'language_id' => 'required',
            'image_id' => 'required',
            'id_documents' => 'nullable'
        ]);
        $country = Country::add($request->all());
        $country->setLanguage($request->get('language_id'));
        $country->setFlagImage($request->get('image_id'));
        $country->setIdDocuments($request->get('id_documents'));

        return redirect()->route('countries.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country = Country::find($id);
        $language = Language::pluck('title', 'id')->all();
        $flag_image = Image::where( 'category_id','=', 1 )->pluck('title', 'id');
        $locale = LaravelLocalization::getCurrentLocale();
        $doc_names = $this->json->build($this->model, 'name')->pluck('name', 'id');
        foreach($doc_names as $key => $title){
            $id_documents[$key] = $title->$locale;
        };
        return view('admin.countries.edit', compact('country','language', 'flag_image', 'id_documents'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'language_id' => 'required',
            'image_id' => 'required',
            'id_documents' => 'nullable'
        ]);
        $country = Country::find($id);
        $country ->setLanguage($request->get('language_id'));
        $country->setFlagImage($request->get('image_id'));
        $country->setIdDocuments($request->get('id_documents'));
        $country->update($request->all());

        return redirect()->route('countries.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect()->route('countries.index');
    }
}
