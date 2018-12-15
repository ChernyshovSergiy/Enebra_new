<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfVideos\ValidateRequest;
use App\Image;
use App\Inf_video;
use App\Inf_video_group;
use App\Inf_video_group_section;
use App\Http\Controllers\Controller;
use App\Language;
use App\Services\ImagesService;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfVideosController extends Controller
{
    public $model;
    public $VideoGroupModel;
    public $VideoGroupSectionModel;
    public $languages;
    public $json;
    public $images;

    public function __construct(
        Inf_video $inf_video,
        Inf_video_group $inf_video_group,
        Inf_video_group_section $inf_video_group_section,
        LanguagesService $languagesService,
        JsonService $jsonService,
        ImagesService $imagesService)
    {
        $this->model = $inf_video;
        $this->VideoGroupModel = $inf_video_group;
        $this->VideoGroupSectionModel = $inf_video_group_section;
        $this->languages = $languagesService;
        $this->json = $jsonService;
        $this->images = $imagesService;
    }

    public function index()
    {
        $videos = $this->json->build($this->model ,'info');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_videos.index',
            compact('videos', 'locale'));
    }

    public function create()
    {
        $video_groups = $this->VideoGroupModel->getVideoGroupNames();
        $video_group_sections = $this->VideoGroupSectionModel->getVideoGroupSectionNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $languages = $this->languages->getActiveLanguages();
        $images = $this->images->getImageNameByCategory(2);

        return view('admin.inf_videos.create',
            compact(
                'video_groups',
                'video_group_sections',
                'text_blocks',
                'languages',
                'images'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addNewVideo($request);

        return redirect()->route('inf_videos.index');
    }

    public function edit($id)
    {
        $video = $this->json->build($this->model ,'info')->find($id);
        $video_group_sections = $this->VideoGroupSectionModel->getVideoGroupSectionNames();
        $video_groups = $this->VideoGroupModel->getVideoGroupNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $languages = $this->languages->getActiveLanguages();
        $images = $this->images->getImageNameByCategory(2);

        return view('admin.inf_videos.edit',
            compact(
                'video',
                'video_group_sections',
                'video_groups',
                'text_blocks',
                'languages',
                'images'
            ));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model::find($id)->editVideo($request);

        return redirect()->route('inf_videos.index');
    }

    public function destroy($id)
    {
        $this->model::find($id)->removeVideo();
        return redirect()->route('inf_videos.index');
    }
}
