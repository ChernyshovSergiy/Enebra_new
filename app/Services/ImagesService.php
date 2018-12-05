<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 3:30 PM
 */

namespace App\Services;


use App\Image;

class ImagesService
{
    public static function getImageNameByCategory($category_id)
    {
        return Image::where( 'category_id','=', $category_id )->pluck('title', 'id');
    }
}