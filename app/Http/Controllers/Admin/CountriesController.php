<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Image;
use App\Inf_id_document;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();
        $flag_image = Image::where( 'category_id','=', 1 )->pluck('title', 'id');
        $id_documents = Inf_id_document::pluck('name', 'id')->all();
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
        $id_documents = Inf_id_document::pluck('name', 'id')->all();
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
