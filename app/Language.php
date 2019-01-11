<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Language
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $localization
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $flag_image_id
 * @property int $is_active
 * @property-read \App\Image $flag_image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereFlagImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereLocalization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Language whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Language extends Model
{

    public static function getLanguages()
    {
        return self::select('id')->get();
    }

    public function flag_image(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Image::class, 'id', 'flag_image_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'language_id');
    }

    protected $fillable = [
        'slug',
        'title',
        'localization'
    ];

    public function getFlagImageCategoryId()
    {
        return ($this->flag_image !== null)
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
