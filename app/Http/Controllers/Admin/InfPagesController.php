<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPages\ValidateRequest;
use App\Inf_page;
use App\Http\Controllers\Controller;
use App\Services\ImagesService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Services\UsersService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPagesController extends Controller
{
    public $users;
    public $pages;
    public $languages;
    public $images;

    public function __construct(
        UsersService $userService,
        PagesService $pagesService,
        LanguagesService $languagesService,
        ImagesService $imagesService)
    {
        $this->users = $userService;
        $this->pages = $pagesService;
        $this->languages = $languagesService;
        $this->images = $imagesService;
    }

    public function index()
    {
        $pages = Inf_page::build();
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_pages.index',compact('pages', 'locale'));
    }

    public function create()
    {
        $users = $this->users->getUsers();
        $page_names = $this->pages->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = Inf_page::getTextColumnsForTranslate();
        $images = $this->images->getImageNameByCategory(5);

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
        $users = $this->users->getUsers();
        $page_names = $this->pages->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = Inf_page::getTextColumnsForTranslate();
        $images = $this->images->getImageNameByCategory(5);

        return view('admin.inf_pages.edit', compact(
            'page','users','page_names',
            'languages', 'text_blocks', 'images')
        );
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
