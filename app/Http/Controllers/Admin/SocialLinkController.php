<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SocialLink\ValidateRequest;
use App\Services\ImagesService;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\SocialLink;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SocialLinkController extends Controller
{
    public $model;
    public $languages;
    public $json;
    public $images;

    public function __construct(
        SocialLink $socialLink,
        LanguagesService $languagesService,
        JsonService $jsonService,
        ImagesService $imagesService)
    {
        $this->model = $socialLink;
        $this->languages = $languagesService;
        $this->json = $jsonService;
        $this->images = $imagesService;
    }
    public function index()
    {
        $social_links = $this->json->build($this->model ,'url');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.Social_link.index', compact('social_links', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $foot_icon_image = $this->images->getImageNameByCategory(6);

        return view('admin.Social_link.create', compact('languages', 'foot_icon_image'));
    }

    public function store(ValidateRequest $request)
    {
        SocialLink::addSocialLink($request);

        return redirect()->route('social_links.index');
    }

    public function edit($id)
    {
        $social_link = $this->json->build($this->model ,'url')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $foot_icon_image = $this->images->getImageNameByCategory(6);

        return view('admin.Social_link.edit', compact('social_link','languages', 'foot_icon_image'));
    }

    public function update(ValidateRequest $request, $id)
    {
        SocialLink::find($id)->editLink($request);

        return redirect()->route('social_links.index');
    }

    public function destroy($id)
    {
        SocialLink::find($id)->removeSocialLink();

        return redirect()->route('social_links.index');
    }

    public function toggle($id)
    {
        SocialLink::find($id)->toggleActive();

        return redirect()->back();
    }
}
