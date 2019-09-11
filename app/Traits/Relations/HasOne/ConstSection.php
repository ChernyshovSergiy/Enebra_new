<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Const_section;

trait ConstSection{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function const_section(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Const_section::class, 'id', 'const_sections_id');
    }
}