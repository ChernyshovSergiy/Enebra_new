<?php

namespace App\Http\Controllers\Admin;

use App\Const_article;
use App\Const_section;
use App\Http\Requests\Admin\ConstArticles\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ConstArticleController extends Controller
{
    public $model;
    public $sectionModel;
    public $json;
    public $languages;

    public function __construct(
        Const_article $const_article,
        Const_section $const_section,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $const_article;
        $this->sectionModel = $const_section;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $articles = $this->json->build($this->model, 'article');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.const_articles.index',
            compact('articles', 'locale'));
    }

    public function create()
    {
        $section_names = $this->sectionModel->getSectionNames();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.const_articles.create',
            compact('section_names','languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addArticle($request);

        return redirect()->route('const_articles.index')
            ->with('status', 'success');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $article = $this->json->build($this->model, 'article')->find($id);
        $section_names = $this->sectionModel->getSectionNames();

        return view('admin.const_articles.edit',
            compact('article','languages','section_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editArticle($request, $id);

        return redirect()->route('const_articles.index');
    }

    public function destroy($id)
    {
        $this->model->removeArticle($id);

        return redirect()->route('const_articles.index');
    }
}
