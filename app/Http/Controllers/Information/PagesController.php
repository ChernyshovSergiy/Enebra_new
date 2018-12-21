<?php

namespace App\Http\Controllers\Information;

use App\Inf_page;
use App\Menu;
use App\Services\JsonService;
use App\socialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesController extends Controller
{
    public $InfPageModel;
    public $MenuModel;
    public $SocialLinkModel;
    public $json;

    public function __construct(
        Inf_page $inf_page,
        Menu $menu,
        SocialLink $socialLink,
        JsonService $jsonService)
    {
        $this->InfPageModel = $inf_page;
        $this->MenuModel = $menu;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
    }
    public function index($slug)
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $status = 'page';
        $menu = $this->MenuModel->getPageMenuPoint($slug);
        $page = $this->InfPageModel->getPage($slug);
        $keywords = $page->text->keywords->$cur_lang;
        $meta_desc = $page->text->meta_desc->$cur_lang;
        $socials = $this->json
            ->build($this->SocialLinkModel ,'url')->sortBy('sort');
        return view('Information.pages.'.$slug,
            compact('status',
                'page',
                'socials',
                'menu',
                'keywords',
                'meta_desc',
                'cur_lang'
            ));
    }
}
