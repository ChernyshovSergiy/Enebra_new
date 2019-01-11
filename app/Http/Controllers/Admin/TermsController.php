<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Terms\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TermsController extends Controller
{
    public $model;
    public $languages;
    public $json;
    public $titleFromMenu;

    public function __construct(
        Term $term,
        LanguagesService $languagesService,
        PagesService $pagesService,
        JsonService $jsonService)
    {
        $this->model = $term;
        $this->languages = $languagesService;
        $this->json = $jsonService;
        $this->titleFromMenu = $pagesService;
    }
    public function index()
    {
        $terms = $this->json->build($this->model ,'content');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.terms.index', compact('terms', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.terms.create', compact(
            'languages', 'text_blocks'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addContent($request);

        return redirect()->route('terms.index');
    }

    public function edit($id)
    {
        $terms = $this->json->build($this->model ,'content')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.terms.edit', compact(
            'terms','languages', 'text_blocks'));
    }

    public function update(Request $request, $id)
    {
        $this->model->editContent($request, $id);

        return redirect()->route('terms.index');
    }

    public function destroy($id)
    {
        $this->model->removeContent($id);
        return redirect()->route('terms.index');
    }
}
