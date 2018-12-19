<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 12/19/18
 * Time: 12:36 PM
 */

namespace App\Traits\Relations\HasMany;


use App\Inf_video;

trait VideoSection
{
    public function videos()
    {

        return $this->hasMany(Inf_video::class, 'video_group_section_id', 'id');

    }
}