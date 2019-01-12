<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfVideoGroup\ValidateRequest;
use App\Inf_video_group;
use App\Menu;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfVideoGroupsController extends Controller
{
    public $model;
    public $menus;
    public $languages;
    public $json;

    public function __construct(
        Inf_video_group $inf_video_group,
        Menu $menus,
        LanguagesService $languagesService,
        JsonService $jsonService)
    {
        $this->model = $inf_video_group;
        $this->menus = $menus;
        $this->languages = $languagesService;
        $this->json = $jsonService;
    }
    public function index()
    {
        $video_groups = $this->json->build($this->model ,'content');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_video_groups.index',
            compact('video_groups', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $menus = $this->menus::getMenuPointName();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.inf_video_groups.create',
            compact('languages', 'menus', 'text_blocks'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addInfVideoGroup($request);

        return redirect()->route('inf_video_groups.index');
    }

    public function edit($id)
    {
        $video_group = $this->json->build($this->model ,'content')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $menus = $this->menus::getMenuPointName();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.inf_video_groups.edit',
            compact('video_group', 'languages', 'menus', 'text_blocks'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editInfVideoGroup($request, $id);

        return redirect()->route('inf_video_groups.index');
    }

    public function destroy($id)
    {
        $this->model->removeInfVideoGroup($id);

        return redirect()->route('inf_video_groups.index');
    }
}
