<?php

namespace App\Traits\Relations\HasOne;

use App\Inf_video_group;

trait VideoGroups{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video_group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_video_group::class, 'id', 'video_group_id');
    }
}