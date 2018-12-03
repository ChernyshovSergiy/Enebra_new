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
//    public $languages;
    public $json;
//    public $titleFromMenu;

    public function __construct(
        Inf_introduction $introduction,
        Inf_page $inf_page,
//        LanguagesService $languagesService,
//        PagesService $pagesService,
        JsonService $jsonService)
    {
        $this->IntroductionModel = $introduction;
        $this->PageModel = $inf_page;
//        $this->languages = $languagesService;
        $this->json = $jsonService;
//        $this->titleFromMenu = $pagesService;
    }
    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $langId = Language::where('slug', $cur_lang)->firstOrFail();
        $id = $langId->id;
        $introduction = ($this->json
            ->build($this->IntroductionModel ,'content'))->first();
//        dd($introduction);
        $introduction_points = Inf_introduction_point::build()->sortBy('sort');
        $video_groups = Inf_video_group::where('language_id', $id)->get();
        $socials = SocialLink::build()->sortBy('sort');
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
