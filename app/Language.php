<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Language extends Model
{

    public static function getLanguages()
    {
        return self::select('id')->get();
    }

    public function flag_image()
    {
        return $this->hasOne(Image::class, 'id', 'flag_image_id');
    }

    protected $fillable = [
        'slug',
        'title',
        'localization'
    ];

    public function getFlagImageCategoryId()
    {
        return ($this->flag_image != null)
            ? $this->flag_image->category_id
            : 'don`t have category';
    }

    public function getFlagImageIdTitle()
    {
        $category = ImageCategory::find($this->getFlagImageCategoryId());
        return ($category != null)
            ? $category->title
            : 'don`t have category';
    }

    public function getFlagImage()
    {
        $flag = Image::find($this->flag_image_id);
        if ($flag == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getFlagImageIdTitle() .'/'. $this->flag_image->image;
    }

    public function setFlagImage($id)
    {
        if ($id == null){
            return;
        }
        $this->flag_image_id = $id;
        $this->save();
    }

}
