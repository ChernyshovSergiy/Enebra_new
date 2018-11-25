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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPagesController extends Controller
{

    public function index()
    {
        $pages = Inf_page::build();
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_pages.index',compact('pages', 'locale'));
    }

    public function create()
    {
        $users = User::pluck( 'last_name', 'id')->all();
        $titles = Menu::where('is_active', '=','1')->get()
            ->sortBy('sort')->pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = Lang::get('nav'.'.'.$title);

        };
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();

        $text_blocks = Inf_page::first()->text_blocks;

        $images = Image::where( 'category_id','=', 5 )->pluck('title', 'id');

        return view('admin.inf_pages.create', compact(
            'users',
            'page_names',
            'languages',
            'text_blocks',
            'images'
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title_id' => 'required',
            'text' => 'nullable',
            'image_id' => 'nullable',
            'menu' => 'required|min:0|max:1',
            'if_desc' => 'required|min:0|max:1',
            'sort' => 'required',
            'original' => 'nullable'
        ]);

        $page = Inf_page::addPage($request->all());
        $page->setImage($request->get('image_id'));
//        $text = $page->setJson($request);
//        $languages = Language::where('is_active', '=','1')
//            ->pluck( 'slug', 'id')->all();
//        $text_blocks = $this->text_blocks;
//        $text = array();
//        $lang = array();
//        foreach ($text_blocks as $block) {
//            foreach ($languages as $key => $language) {
//                if ($key == 1) {
//                    $lang = [$language => $request->get($block . ':' . $language)];
//                } else {
//                    $lang[$language] = $request->get($block . ':' . $language);
//                }
//            }
//            $text = array_add($text, $block, $lang);
//        }
        $page->text = $page->setJson($request);
        $page->save();
        return redirect()->route('inf_pages.index');

    }

    public function show(Inf_page $inf_page)
    {
        //
    }

    public function edit($id)
    {
        $page = Inf_page::build()->find($id);
        $users = User::pluck( 'last_name', 'id')->all();
        $titles = Menu::where('is_active', '=','1')->get()
            ->sortBy('sort')->pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = Lang::get('nav'.'.'.$title);

        };
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();

        $text_blocks = Inf_page::first()->text_blocks;

        $images = Image::where( 'category_id','=', 5 )->pluck('title', 'id');

        return view('admin.inf_pages.edit', compact('page','users','page_names','languages', 'text_blocks', 'images'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title_id' => 'required',
            'text' => 'nullable',
            'image_id' => 'nullable',
            'menu' => 'required|min:0|max:1',
            'if_desc' => 'required|min:0|max:1',
            'sort' => 'required',
            'original' => 'nullable'
        ]);
        $page = Inf_page::find($id);
        $page->editPage($request->all());
        $page->setImage($request->get('image_id'));
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();
        $text_blocks = Inf_page::first()->text_blocks;
        $text = array();
        $lang = array();
        foreach ($text_blocks as $block) {
            foreach ($languages as $key => $language) {
                if ($key == 1) {
                    $lang = [$language => $request->get($block . ':' . $language)];
                } else {
                    $lang[$language] = $request->get($block . ':' . $language);
                }
            }
            $text = array_add($text, $block, $lang);
        }
        $page->text = json_encode($text);
        $page->update($request->all());
        return redirect()->route('inf_pages.index');
    }

    public function destroy($id)
    {
        Inf_page::find($id)->removePage();
        return redirect()->route('inf_pages.index');
    }
}
