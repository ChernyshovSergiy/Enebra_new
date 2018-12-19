<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 12/18/18
 * Time: 5:15 PM
 */

namespace App\Traits\Relations\HasMany;

use App\Inf_video;

trait Videos
{
    public function videos()
    {

        return $this->hasMany(Inf_video::class, 'video_group_id', 'id');

    }
}