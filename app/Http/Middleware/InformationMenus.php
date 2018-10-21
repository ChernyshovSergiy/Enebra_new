<?php

namespace App\Http\Middleware;

use DB;
use Menu;
use Closure;

class InformationMenus
{
    public function handle($request, Closure $next)
    {
        $information_menu = DB::table('menus')->where( 'is_active','=', 1 )->get()->sortBy('sort');
        Menu::make('myNav', function ($m) use ($information_menu){
            foreach ($information_menu as $item) {
                if ($item->parent == 0){
                    $m->add($item->title, $item->url)->id($item->id);
                }
                else{
                    if ($m->find($item->parent))
                    {
                        $m->find($item->parent)->add($item->title, $item->url)->id($item->id);
                    }
                }
            }
        });
        return $next($request);
    }
}
