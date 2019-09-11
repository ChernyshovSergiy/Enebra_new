<?php

namespace App\Traits\Relations\HasOne;

use App\Models\SocialLink;

trait SocialLinks{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socialLink(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SocialLink::class, 'image_id', 'id');
    }
}