<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 12/18/18
 * Time: 5:15 PM
 */

namespace App\Traits\Relations\HasMany;

use App\Inf_video_group_section;

trait VideoGroupSections
{
    public function video_group_sections()
    {

        return $this->hasMany(Inf_video_group_section::class, 'video_group_id', 'id');

    }
}