<?php

namespace App\Traits\Relations\BelongsTo;

use App\Inf_video_group;

trait VideoGroups{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video_group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_video_group::class, 'video_group_id', 'id');
    }
}