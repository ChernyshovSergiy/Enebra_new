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

class PagesService
{
    public $menus;
    public function __construct(MenusService $menusService)
    {
        $this->menus = $menusService;
    }

    public function getActivePagesName()
    {
        $titles = $this->menus->getTitleMenuPoints();
//        $titles = Menu::where('is_active', '=','1')->get()
//            ->sortBy('sort')->pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = Lang::get('nav'.'.'.$title);
        };
        return $page_names;
    }
}