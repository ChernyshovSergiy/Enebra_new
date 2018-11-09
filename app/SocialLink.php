<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socialLink extends Model
{
    public function image()
    {
//        return $this->hasOne(Image::class,'id', 'image_id');
        return $this->belongsTo(Image::class,'image_id', 'id');
    }

    protected $fillable = [
        'name',
        'url',
        'sort',
        'image_id'
    ];

//    protected $casts = [
//        'id' => 'int',
//        'url' => 'array'
//    ];

    public static function add($fields)
    {
        $social_link = new static;
        $social_link->fill($fields);
        $social_link->save();

        return $social_link;
    }

    public function getImageCategoryId()
    {
        return ($this->image != null)
            ? $this->image->category_id
            : 'don`t have category';
    }

    public function getImageIdTitle()
    {
        $category = ImageCategory::find($this->getImageCategoryId());
        return ($category != null)
            ? $category->title
            : 'don`t have category';
    }

    public function getImage()
    {
        $icon = Image::find($this->image_id);
        if ($icon == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getImageIdTitle() .'/'. $icon->image;
    }

    public function setImage($id)
    {
        if ($id == null){
            return;
        }
        $this->image_id = $id;
        $this->save();
    }

    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive()
    {
        if ($this->is_active == 0)
        {
            return $this->active();
        }
        return $this->notActive();
    }

//    public function check($result){
//        if ($result == isEmpty()){
//            return false;
//        }
//        $result->transform(function ($item, $key){
//            $item->url = jason_decode($item->url);
//            return $item;
//        });
//        return $result;
//    }
}
