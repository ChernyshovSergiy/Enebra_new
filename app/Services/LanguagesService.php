<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 3:22 PM
 */

namespace App\Services;


use App\Language;

class LanguagesService
{
    public static function getActiveLanguages()
    {
        return Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();
    }
}