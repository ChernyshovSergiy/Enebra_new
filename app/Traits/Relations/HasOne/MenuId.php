<?php

namespace App\Traits\Relations\HasOne;

use App\Menu;

trait MenuId{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}