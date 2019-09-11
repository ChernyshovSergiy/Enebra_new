<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 4:28 PM
 */

namespace App\Services;


use App\Models\Menu;

class MenusService
{
    public function getTitleMenuPoints()
    {
        return Menu::where('is_active', '=','1')->get()
            ->sortBy('sort')->pluck( 'title', 'id')->all();
    }
}