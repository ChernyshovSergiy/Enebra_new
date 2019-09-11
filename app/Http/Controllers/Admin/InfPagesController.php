<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPages\ValidateRequest;
use App\Models\Inf_page;
use App\Http\Controllers\Controller;
use App\Services\ImagesService;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Services\UsersService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPagesController extends Controller
{
    public $model;
    public $users;
    public $pages;
    public $languages;
    public $json;
    public $images;

    public function __construct(
        Inf_page $inf_page,
        UsersService $userService,
        PagesService $pagesService,
        LanguagesService $languagesService,
        JsonService $jsonService,
        ImagesService $imagesService)
    {
        $this->model = $inf_page;
        $this->users = $userService;
        $this->pages = $pagesService;
        $this->languages = $languagesService;
        $this->json = $jsonService;
        $this->images = $imagesService;
    }
    public function index()
    {
        $pages = $this->json->build($this->model ,'text');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_pages.index',compact('pages', 'locale'));
    }
    public function create()
    {
        $users = $this->users->getUsers();
        $page_names = $this->pages->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();
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
        $this->model->addPage($request);
        return redirect()->route('inf_pages.index');
    }
    public function edit($id)
    {
        $page = $this->json->build($this->model ,'text')->find($id);
        $users = $this->users->getUsers();
        $page_names = $this->pages->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $images = $this->images->getImageNameByCategory(5);
        return view('admin.inf_pages.edit', compact(
                'page','users','page_names',
                'languages', 'text_blocks', 'images')
        );
    }
    public function update(ValidateRequest $request, $id)
    {
        $this->model->editPage($request, $id);
        return redirect()->route('inf_pages.index');
    }
    public function destroy($id)
    {
        $this->model->removePage($id);
        return redirect()->route('inf_pages.index');
    }
}
