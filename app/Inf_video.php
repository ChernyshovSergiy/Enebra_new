<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_video extends Model
{
    public function videoGroupId()
    {
        return $this->hasOne(Inf_video_group::class, 'id', 'video_group_id');
    }

    public function videoGroupSectionId()
    {
        return $this->hasOne(Inf_video_group_section::class, 'id', 'video_group_section_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class,'id', 'img_id');
    }

    public function language()
    {
        return $this->hasMany(Language::class, 'id', 'language_id');
    }
}
