<?php

namespace App\Traits\Methods;

use App\Menu;

trait GetTitleFromMenu
{
    public function getActiveTitleMenuPoints()
    {
        return Menu::where('is_active', '=','1')->get()
            ->sortBy('sort')->pluck( 'title', 'id')->all();
    }
}