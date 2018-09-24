<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_plan_section_point extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }

    public function phase()
    {
        return $this->hasOne(Inf_plan_phase::class, 'id', 'phase_id');
    }

    public function section()
    {
        return $this->hasOne(Inf_plan_phase_section::class, 'id', 'section_id');
    }
}
