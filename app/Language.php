<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public static function getLanguages()
    {
        return self::select('id')->get();
    }
}
