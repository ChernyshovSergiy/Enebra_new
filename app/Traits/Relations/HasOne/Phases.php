<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Inf_plan_phase;

trait Phases{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phase(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_plan_phase::class, 'id', 'phase_id');
    }
}