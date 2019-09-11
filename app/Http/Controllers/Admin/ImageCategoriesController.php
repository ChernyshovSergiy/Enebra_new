<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ImageCategories\ValidateRequest;
use App\Models\ImageCategory;
use App\Http\Controllers\Controller;

class ImageCategoriesController extends Controller
{
    public $model;

    public function __construct(
        ImageCategory $imageCategory
    )
    {
        $this->model = $imageCategory;
    }

    public function index()
    {
        $image_categories = $this->model::all();
        return view('admin.image_categories.index',
            compact('image_categories'));
    }

    public function create()
    {
        return view('admin.image_categories.create');
    }

    public function store(ValidateRequest $request)
    {
        $this->model::create($request->all());

        return redirect()->route('image_categories.index');
    }

    public function edit($id)
    {
        $imageCategory = $this->model::find($id);
        return view('admin.image_categories.edit', compact('imageCategory'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->updateImageCategory($request, $id);

        return redirect()->route('image_categories.index');
    }

    public function destroy($id)
    {
        $this->model->removeImageCategory($id);

        return redirect()->route('image_categories.index');
    }
}
