<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_plan_phase_section extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }
}
