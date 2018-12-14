<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfVideoGroupSections\ValidateRequest;
use App\Inf_video_group;
use App\Inf_video_group_section;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfVideoGroupSectionsController extends Controller
{
    public $model;
    public $videoGroupModel;
    public $json;
    public $languages;

    public function __construct(
        Inf_video_group_section $inf_video_group_section,
        Inf_video_group $inf_video_group,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $inf_video_group_section;
        $this->videoGroupModel = $inf_video_group;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $video_group_sections = $this->json->build($this->model, 'title');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_video_group_sections.index',
            compact('video_group_sections', 'locale'));
    }

    public function create()
    {
        $video_group = $this->videoGroupModel->getVideoGroupNames();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_video_group_sections.create',
            compact('video_group', 'languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->createNewVideoGroupSection($request);

        return redirect()->route('inf_video_group_sections.index');
    }

    public function edit($id)
    {
        $video_group_section = $this->json->build($this->model, 'title')->find($id);
        $video_group = $this->videoGroupModel->getVideoGroupNames();
        $languages = $this->languages->getActiveLanguages();
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_video_group_sections.edit',
            compact('video_group_section', 'video_group', 'languages', 'locale'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editVideoGroupSection($request, $id);

        return redirect()->route('inf_video_group_sections.index');
    }

    public function destroy($id)
    {
        $this->model::find($id)->removeVideoGroupSection();
        return redirect()->route('inf_video_group_sections.index');
    }
}
