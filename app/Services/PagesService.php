<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 3:10 PM
 */

namespace App\Services;


use App\Menu;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesService
{
    public $menus;
    public function __construct(MenusService $menusService)
    {
        $this->menus = $menusService;
    }

    public function getActivePagesName()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = $this->menus->getTitleMenuPoints();
        $page_names = [];
        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
        };
        return $page_names;
    }
}