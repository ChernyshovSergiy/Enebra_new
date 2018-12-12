<?php

namespace App\Traits\Relations\HasOne;

use App\Inf_plan_phase_section;

trait Sections{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function section(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_plan_phase_section::class, 'id', 'section_id');
    }
}