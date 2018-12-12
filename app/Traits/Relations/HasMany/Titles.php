<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 12/6/18
 * Time: 12:14 PM
 */

namespace App\Traits\Relations\HasMany;


use App\Inf_page;

trait Titles
{

    public function title()
    {
        return $this->hasMany(Inf_page::class, 'title_id', 'id');
    }
}