<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_contact_message extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
