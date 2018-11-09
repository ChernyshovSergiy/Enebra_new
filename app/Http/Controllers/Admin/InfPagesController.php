<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Inf_page;
use App\Language;
use App\Menu;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lang;

class InfPagesController extends Controller
{
    public $text_blocks = [
        'sub_title',
        'description',
        'top_textarea',
        'left_textarea',
        'right_textarea',
        'text_description',
        'keywords',
        'meta_desc',
    ];

    public function index()
    {
        $pages = Inf_page::all();
//        $pages->transform(function ($item, $key){
//            $item->text = json_encode($item->text);
//            return $item;
//        });
//        return $pages;
//        $pages->toArray();
//        dd($pages);
//        $text = Inf_page::where('text')->get();
//        $text->toArray();
//        dd($text);
//        $pages->text->description->toArray();

        $languages = Language::all();
        return view('admin.inf_pages.index',compact('pages', 'languages'));
    }

    public function create()
    {
        $users = User::pluck( 'last_name', 'id')->all();
        $titles = Menu::where('is_active', '=','1')->get()
            ->sortBy('sort')->pluck( 'title', 'id')->all();

        foreach($titles as $title){
            $page_names[] = Lang::get('nav'.'.'.$title);
        };

        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();

        $text_blocks = $this->text_blocks;

        $images = Image::where( 'category_id','=', 5 )->pluck('title', 'id');

        return view('admin.inf_pages.create', compact(
            'users',
            'page_names',
            'languages',
            'text_blocks',
            'images'
        ));
    }

    public function translate($id)
    {
        return view('admin.inf_pages.translate');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title_id' => 'required',
            'text' => 'nullable',
            'image_id' => 'nullable|image',
            'menu' => 'required|min:0|max:1',
            'if_desc' => 'required|min:0|max:1',
            'sort' => 'required',
            'original' => 'nullable'
        ]);

        $page = Inf_page::addPage($request->all());
        $page->setImg_id($request->file('image_id'));

        return redirect()->route('inf_pages.index');

    }

    public function show(Inf_page $inf_page)
    {
        //
    }

    public function edit(Inf_page $inf_page)
    {
        //
    }

    public function update(Request $request, Inf_page $inf_page)
    {
        //
    }

    public function destroy(Inf_page $inf_page)
    {
        //
    }
}
