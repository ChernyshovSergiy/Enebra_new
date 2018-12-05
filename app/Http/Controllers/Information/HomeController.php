<?php

namespace App\Http\Controllers\Information;

use App\Inf_introduction;
use App\Inf_introduction_point;
use App\Inf_page;
use App\Inf_video_group;
use App\Language;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\socialLink;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public $IntroductionModel;
    public $PageModel;
    public $SocialLinkModel;
    public $json;

    public function __construct(
        Inf_introduction $introduction,
        Inf_page $inf_page,
        SocialLink $socialLink,
        JsonService $jsonService)
    {
        $this->IntroductionModel = $introduction;
        $this->PageModel = $inf_page;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
    }

    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $langId = Language::where('slug', $cur_lang)->firstOrFail();
        $id = $langId->id;
        $introduction = ($this->json
            ->build($this->IntroductionModel ,'content'))->first();
        $introduction_points = Inf_introduction_point::build()->sortBy('sort');
        $video_groups = Inf_video_group::where('language_id', $id)->get();
        $socials = ($this->json
            ->build($this->SocialLinkModel ,'url'))->sortBy('sort');
        $pages = ($this->json
            ->build($this->PageModel ,'text'))->sortBy('sort');

        return view('Information.index',
            compact('status',
                'introduction',
                'introduction_points',
                'video_groups',
                'socials',
                'cur_lang',
                'pages'));
    }
}
