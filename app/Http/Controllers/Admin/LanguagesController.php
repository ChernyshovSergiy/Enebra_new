<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        $flag_image = Image::where( 'category_id','=', 1 )->pluck('title', 'id');
        return view('admin.languages.create', compact('flag_image'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'max:2|min:2',
            'title' => 'required',
            'localization' => 'required',
            'flag_image_id' => 'required'
        ]);
        $language = Language::create($request->all());
        $language->setFlagImage($request->get('flag_image_id'));

        return redirect()->route('languages.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $language = Language::find($id);
        $flag_image = Image::where( 'category_id','=', 1 )->pluck('title', 'id');
        return view('admin.languages.edit', compact('language', 'flag_image'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slug' => 'max:2|min:2',
            'title' => 'required',
            'localization' => 'required',
            'flag_image_id' => 'required'
        ]);
        $language = Language::find($id);
        $language->setFlagImage($request->get('flag_image_id'));
        $language->update($request->all());

        return redirect()->route('languages.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Language::find($id)->delete();
        return redirect()->route('languages.index');
    }
}
