<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_social_network_link extends Model
{
    public function image()
    {
        return $this->hasOne(Image::class,'id', 'img_id');
    }
}
