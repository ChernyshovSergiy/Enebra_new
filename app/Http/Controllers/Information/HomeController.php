<?php

namespace App\Http\Controllers\Information;

use App\Inf_introduction;
use App\Inf_introduction_point;
use App\Inf_video_group;
use App\Language;
use App\Http\Controllers\Controller;
use App\Repositories\SocialLinksRepository;
use Config;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    protected $s_rep;
    public function __construct(SocialLinksRepository $s_rep)
    {
        $this->s_rep = $s_rep;
    }

    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $langId = Language::where('slug', $cur_lang)->firstOrFail();
        $id = $langId->id;
        $introduction = Inf_introduction::where('language_id', $id)->firstOrFail();
        $introduction_points = Inf_introduction_point::where('language_id', $id)->get()->sortBy('sort');
        $video_groups = Inf_video_group::where('language_id', $id)->get();
//        $footer_social_icons = $this->getSocialLinks()->where('is_active', '=', 1)->get()->sortBy('sort');
        $socials = $this->getSocialLinks();
//        dd($socials);
        return view('Information.index', compact('status', 'introduction', 'introduction_points', 'video_groups', 'socials', 'cur_lang'));
    }

    protected function getSocialLinks(){
        $social_links = $this->s_rep->get('*', Config::get('settings.social_links_count'));
        return $social_links;
    }
}
