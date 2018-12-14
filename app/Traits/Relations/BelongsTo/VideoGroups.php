<?php

namespace App\Traits\Relations\BelongsTo;

use App\Inf_video_group;

trait VideoGroups{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function video_group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Inf_video_group::class, 'video_group_id', 'id');
    }
}