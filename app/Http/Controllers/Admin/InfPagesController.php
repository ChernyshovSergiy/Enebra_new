<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPages\ValidateRequest;
use App\Inf_page;
use App\Http\Controllers\Controller;
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
        $users = Inf_page::getUsers();
        $page_names = Inf_page::getActivePagesName();
        $languages = Inf_page::getActiveLanguages();
        $text_blocks = Inf_page::getTextColumnsForTranslite();
        $images = Inf_page::getImageNameByCategory();

        return view('admin.inf_pages.create', compact(
            'users',
            'page_names',
            'languages',
            'text_blocks',
            'images'
        ));
    }

    public function store(ValidateRequest $request)
    {
        Inf_page::addPage($request);

        return redirect()->route('inf_pages.index');

    }

    public function edit($id)
    {
        $page = Inf_page::build()->find($id);
        $users = Inf_page::getUsers();
        $page_names = Inf_page::getActivePagesName();
        $languages = Inf_page::getActiveLanguages();
        $text_blocks = Inf_page::getTextColumnsForTranslite();
        $images = Inf_page::getImageNameByCategory();

        return view('admin.inf_pages.edit', compact('page','users','page_names','languages', 'text_blocks', 'images'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $page = Inf_page::find($id);
        $page->editPage($request);

        return redirect()->route('inf_pages.index');
    }

    public function destroy($id)
    {
        Inf_page::find($id)->removePage();

        return redirect()->route('inf_pages.index');
    }
}
