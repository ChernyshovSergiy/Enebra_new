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
    public function index($slag)
    {
//        dd($slag);
        $status = 'page '.$slag;
//        dd($status);
        $menu = $this->MenuModel->getMenuPoint($slag);
//        dd($menu);
        $video_group = $this->InfVideoGroupModel->getVideoGroup($slag);
//        dd($video_group);
        $socials = $this->json
            ->build($this->SocialLinkModel ,'url')->sortBy('sort');
        $cur_lang = LaravelLocalization::getCurrentLocale();

        return view('Information..videos.list',
            compact('status',
                'video_group',
                'socials',
                'menu',
                'cur_lang'
            ));
    }
}
