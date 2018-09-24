<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public static function getStatuses()
    {
        return self::select('id')->get();
    }
}
