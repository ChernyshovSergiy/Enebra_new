<?php

namespace App\Http\Controllers\Admin;

use App\ImageCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageCategoriesController extends Controller
{
    public function index()
    {
        $image_categories = ImageCategory::all();
        return view('admin.image_categories.index', compact('image_categories'));
    }

    public function create()
    {
        return view('admin.image_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        ImageCategory::create($request->all());

        return redirect()->route('image_categories.index');
    }

    public function show(ImageCategory $imageCategory)
    {
        //
    }

    public function edit($id)
    {
        $imageCategory = ImageCategory::find($id);
        return view('admin.image_categories.edit', compact('imageCategory'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $imageCategory = ImageCategory::find($id);
        $imageCategory->update($request->all());
        return redirect()->route('image_categories.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        ImageCategory::find($id)->delete();
        return redirect()->route('image_categories.index');
    }
}
