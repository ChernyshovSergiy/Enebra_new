<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Inf_plan_section_point;

trait PlanPhases
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plan_points(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Inf_plan_section_point::class, 'phase_id', 'id');
    }
}