<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_plan_phase extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }
}
