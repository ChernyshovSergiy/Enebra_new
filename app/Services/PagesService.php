<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 3:10 PM
 */

namespace App\Services;


use App\Menu;
use App\Traits\Methods\GetTitleFromMenu;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesService
{
    use GetTitleFromMenu;
//    public $menus;
//    public function __construct(MenusService $menusService)
//    {
//        $this->menus = $menusService;
//    }

    public function getActivePagesName(): array
    {
        $locale = LaravelLocalization::getCurrentLocale();
//        $titles = $this->menus->getTitleMenuPoints();
        $titles = $this->getActiveTitleMenuPoints();
        $page_names = [];
        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
        }
        return $page_names;
    }
}