<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfIntroduction\ValidateRequest;
use App\Inf_introduction;
use App\Language;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfIntroductionsController extends Controller
{
    public $model;
    public $languages;
    public $json;
    public $titleFromMenu;

    public function __construct(
        Inf_introduction $introduction,
        LanguagesService $languagesService,
        PagesService $pagesService,
        JsonService $jsonService)
    {
        $this->model = $introduction;
        $this->languages = $languagesService;
        $this->json = $jsonService;
        $this->titleFromMenu = $pagesService;
    }
    public function index()
    {
        $introductions = $this->json->build($this->model ,'content');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_introductions.index', compact('introductions', 'locale'));
    }

    public function create()
    {
        $titles = $this->titleFromMenu->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = Inf_introduction::getTextColumnsForTranslate();

        return view('admin.inf_introductions.create', compact(
            'languages', 'titles', 'text_blocks'));
    }

    public function store(ValidateRequest $request)
    {
       Inf_introduction::addContent($request);

        return redirect()->route('introductions.index');
    }

    public function edit($id)
    {
        $introduction = $this->json->build($this->model ,'content')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = Inf_introduction::getTextColumnsForTranslate();
        $titles = $this->titleFromMenu->getActivePagesName();


        return view('admin.inf_introductions.edit', compact(
            'introduction','languages', 'text_blocks', 'titles'));
    }

    public function update(ValidateRequest $request, $id)
    {
        Inf_introduction::editContent($request, $id);

        return redirect()->route('introductions.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_introduction::find($id)->delete();
        return redirect()->route('introductions.index');
    }
}
