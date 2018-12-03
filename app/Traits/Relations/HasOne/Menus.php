<?php

namespace App\Traits\Relations\HasOne;

use App\Menu;

trait Menus{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'title_id');
    }
}