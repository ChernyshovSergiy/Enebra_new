<?php

namespace App\Http\Controllers\Information;

use App\Inf_introduction;
use App\Inf_introduction_point;
use App\Inf_page;
use App\Inf_video_group;
use App\Language;
use App\Http\Controllers\Controller;
use App\socialLink;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $langId = Language::where('slug', $cur_lang)->firstOrFail();
        $id = $langId->id;
        $introduction = Inf_introduction::where('language_id', $id)->firstOrFail();
        $introduction_points = Inf_introduction_point::build()->sortBy('sort');
        $video_groups = Inf_video_group::where('language_id', $id)->get();
        $socials = SocialLink::build()->sortBy('sort');
        $pages = Inf_page::build()->sortBy('sort');
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
