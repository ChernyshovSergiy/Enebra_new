<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Images\StoreRequest;
use App\Image;
use App\ImageCategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        $image_categories = ImageCategory::pluck('title', 'id')->all();
        $users = User::pluck('last_name', 'id')->all();
//        dd($users);
        return view('admin.images.create', compact('image_categories', 'users'));
    }

    public function store(StoreRequest $request)
    {
        $image = Image::add($request->all());
        $image->uploadImage($request->file('image'));
        $image->setCategory($request->get('category_id'));

        return redirect()->route('images.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $image = Image::find($id);
        $image_categories = ImageCategory::pluck('title', 'id')->all();
        $users = User::pluck('last_name', 'id')->all();

        return view('admin.images.edit', compact('image','image_categories', 'users'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        $image->removeImage();
        $image->slug = null;

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'user_id' => 'nullable',
            'image' => 'required|image'
        ]);

        $image->edit($request->all());
        $image->uploadImage($request->file('image'));
        $image->setCategory($request->get('category_id'));
//        dd($image);

        return redirect()->route('images.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Image::find($id)->remove();
        return redirect()->route('images.index');
    }
}
