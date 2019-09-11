<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Inf_video_group_section;

trait VideoGroupSections{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video_group_section(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_video_group_section::class, 'id', 'video_group_section_id');
    }
}