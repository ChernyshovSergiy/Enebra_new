<?php

namespace App\Traits\Relations\HasOne;

use App\Menu;

trait Titles{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function title()
    {
        return $this->hasOne(Menu::class, 'id', 'title_id');
    }
}