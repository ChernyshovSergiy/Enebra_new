<?php

namespace App\Http\Middleware;

use App\Language;
use DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Menu;
use Closure;

class InformationMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $curentLangId = DB::table('languages')->where('slug', '=', LaravelLocalization::getCurrentLocale())->first();
//        $information_menu = DB::table('menus')->where( 'is_active','=', 1 )->where( 'language_id','=', $curentLangId->id )->get()->sortBy('sort');
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
