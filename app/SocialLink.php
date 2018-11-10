<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\socialLink
 *
 * @property int $id
 * @property string $name
 * @property int $is_active
 * @property mixed|null $url
 * @property int $sort
 * @property int|null $image_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Image|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\socialLink whereUrl($value)
 * @mixin \Eloquent
 */
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

}
