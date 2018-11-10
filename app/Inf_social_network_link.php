<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_social_network_link
 *
 * @property-read \App\Image $image
 * @mixin \Eloquent
 */
class Inf_social_network_link extends Model
{
    public function image()
    {
        return $this->hasOne(Image::class,'id', 'img_id');
    }
}
