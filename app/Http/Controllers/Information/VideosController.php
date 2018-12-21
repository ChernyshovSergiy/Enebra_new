<?php

namespace App\Http\Controllers\Information;

use App\Inf_video_group;
use App\Menu;
use App\Services\JsonService;
use App\socialLink;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class VideosController extends Controller
{
    public $InfVideoGroupModel;
    public $MenuModel;
    public $SocialLinkModel;
    public $json;

    public function __construct(
        Inf_video_group $inf_video_group,
        Menu $menu,
        SocialLink $socialLink,
        JsonService $jsonService)
    {
        $this->InfVideoGroupModel = $inf_video_group;
        $this->MenuModel = $menu;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
    }
    public function index($slug)
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $status = 'page '.$slug;
        $menu = $this->MenuModel->getVideoMenuPoint($slug);
        $video_group = $this->InfVideoGroupModel->getVideoGroup($slug);
//        dd($video_group);
        $keywords = $video_group->content->keywords->$cur_lang;
        $meta_desc = $video_group->content->meta_desc->$cur_lang;
        $socials = $this->json
            ->build($this->SocialLinkModel ,'url')->sortBy('sort');

        return view('Information.videos.list',
            compact('status',
                'video_group',
                'socials',
                'menu',
                'keywords',
                'meta_desc',
                'cur_lang'
            ));
    }
}
