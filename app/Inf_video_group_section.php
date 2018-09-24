<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_video_group_section extends Model
{
    public function videoGroupId()
    {
        return $this->hasMany(Inf_video_group::class, 'id', 'video_group_id');
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }
}
