<?php

namespace App\Http\Controllers\Information;

use App\Inf_page;
use App\Menu;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\socialLink;
use App\Http\Controllers\Controller;
use App\Term;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesController extends Controller
{
    public $InfPageModel;
    public $MenuModel;
    public $TermModel;
    public $Languages;
    public $SocialLinkModel;
    public $json;

    public function __construct(
        Inf_page $inf_page,
        Menu $menu,
        Term $term,
        LanguagesService $languages,
        SocialLink $socialLink,
        JsonService $jsonService)
    {
        $this->InfPageModel = $inf_page;
        $this->MenuModel = $menu;
        $this->TermModel = $term;
        $this->Languages = $languages;
        $this->SocialLinkModel = $socialLink;
        $this->json = $jsonService;
    }
    public function index($slug)
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $status = 'page';
        $menu = $this->MenuModel->getPageMenuPoint($slug);
        $page = $this->InfPageModel->getPage($slug);
        $languages = $this->Languages->getFullActiveLanguages();
        $terms = $this->json->build($this->TermModel ,'content')->first();
//        dd($terms);
//        dd($slug, $page->title->faq_questions);
//        dd((int) count($page->title->purpose));
        $keywords = $page->text->keywords->$cur_lang;
        $meta_desc = $page->text->meta_desc->$cur_lang;
        $socials = $this->json
            ->build($this->SocialLinkModel ,'url')->sortBy('sort');
        return view('Information.pages.'.$slug,
            compact('status',
                'page',
                'socials',
                'menu',
                'slug',
                'languages',
                'terms',
                'keywords',
                'meta_desc',
                'cur_lang'
            ));
    }
}
