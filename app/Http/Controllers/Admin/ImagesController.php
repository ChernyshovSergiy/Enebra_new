<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Images\StoreRequest;
use App\Http\Requests\Admin\Images\ValidateRequest;
use App\Image;
use App\ImageCategory;
use App\User;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public $model;
    public $modelImageCategories;
    public $userNames;

    public function __construct(
        Image $image,
        ImageCategory $imageCategory,
        User $users
    )
    {
        $this->model = $image;
        $this->modelImageCategories = $imageCategory;
        $this->userNames = $users;
    }

    public function index()
    {
        $images = $this->model::all();

        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        $image_categories = $this->modelImageCategories->getCategoryNames();
        $users = $this->userNames->getUserNames();

        return view('admin.images.create',
            compact('image_categories', 'users'));
    }

    public function store(StoreRequest $request)
    {
        $this->model->addImage($request);

        return redirect()->route('images.index');
    }

    public function edit($id)
    {
        $image = $this->model::find($id);
        $image_categories = $this->modelImageCategories->getCategoryNames();
        $users = $this->userNames->getUserNames();

        return view('admin.images.edit',
            compact('image','image_categories', 'users'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->clearPreviousEntry($request, $id);
        $this->model->editImage($request, $id);

        return redirect()->route('images.index');
    }

    public function destroy($id)
    {
        $this->model->remove($id);

        return redirect()->route('images.index');
    }
}
