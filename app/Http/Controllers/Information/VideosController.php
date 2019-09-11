<?php

namespace App\Http\Controllers\Information;

use App\Models\Inf_video_group;
use App\Models\Menu;
use App\Services\JsonService;
use App\Models\SocialLink;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class VideosController extends Controller
{
    public $InfVideoGroupModel;
    public $MenuModel;
    public $SocialLinkModel;
    public $json;
    public $TermModel;

    public function __construct(
        Inf_video_group $inf_video_group,
        Menu $menu,
        SocialLink $socialLink,
        JsonService $jsonService,
        Term $term
    )
    {
        $this->InfVideoGroupModel = $inf_video_group;
        $this->MenuModel = $menu;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
        $this->TermModel = $term;
    }
    public function index($slug)
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $status = 'page '.$slug;
        $menu = $this->MenuModel->getVideoMenuPoint($slug);
        $video_group = $this->InfVideoGroupModel->getVideoGroup($slug);
        $terms = $this->json->build($this->TermModel ,'content')->first();
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
                'cur_lang',
                'terms'
            ));
    }
}
