<?php

namespace App\Http\Controllers\Information;

use App\Inf_introduction;
use App\Inf_introduction_point;
use App\Inf_page;
use App\Inf_video_group;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\socialLink;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public $IntroductionModel;
    public $IntroductionPointModel;
    public $InfVideoGroupModel;
    public $PageModel;
    public $SocialLinkModel;
    public $json;

    public function __construct(
        Inf_introduction $introduction,
        Inf_introduction_point $introduction_point,
        Inf_video_group $inf_video_group,
        Inf_page $inf_page,
        SocialLink $socialLink,
        JsonService $jsonService)
    {
        $this->IntroductionModel = $introduction;
        $this->IntroductionPointModel = $introduction_point;
        $this->InfVideoGroupModel = $inf_video_group;
        $this->PageModel = $inf_page;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
    }

    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $introduction = $this->json
            ->build($this->IntroductionModel ,'content')->first();
        $introduction_points = $this->json
            ->build($this->IntroductionPointModel, 'point')->sortBy('sort');
        $video_groups = $this->json
            ->build($this->InfVideoGroupModel ,'content');
        $socials = $this->json
            ->build($this->SocialLinkModel ,'url')->sortBy('sort');
        $pages = $this->json
            ->build($this->PageModel ,'text')->sortBy('sort');
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
