<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_introduction extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }
}
