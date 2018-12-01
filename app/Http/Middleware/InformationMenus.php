<?php

namespace App\Http\Middleware;

use DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Menu;
use Closure;

class InformationMenus
{
    public function build($model, $column)
    {
        $result = $model->get();
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = $this->column;
            if (is_string($item->$column) && is_object(json_decode($item->$column)) && json_last_error() == JSON_ERROR_NONE){
                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }
    public function handle($request, Closure $next)
    {


        $information_menu = DB::table('menus')->where( 'is_active','=', 1 )->get()->sortBy('sort');
        $information_menu->transform(function ($item){
            $column = 'title';
            if (is_string($item->$column) && is_object(json_decode($item->$column)) && json_last_error() == JSON_ERROR_NONE){
                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        $menu = Menu::make('myNav', function ($m) use ($information_menu){
            $locale = LaravelLocalization::getCurrentLocale();
            foreach ($information_menu as $item) {
                if ($item->parent == 0){
                    $m->add($item->title->$locale, $item->url)->id($item->id);
                }
                else{
                    if ($m->find($item->parent))
                    {
                        $m->find($item->parent)->add($item->title->$locale, $item->url)->id($item->id);
                    }
                }
            }
        });
        return $next($request);
    }
}
