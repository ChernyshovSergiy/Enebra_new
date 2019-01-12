<?php

namespace App;

use App\Traits\Relations\HasMany\FlagImages;
use App\Traits\Relations\HasMany\UserLanguages;
use Illuminate\Database\Eloquent\Model;

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
    use FlagImages, UserLanguages;

    protected $fillable = [
        'slug',
        'title',
        'localization',
        'flag_image_id'
    ];

    public function addNewLanguage($request): void
    {
        $language = new static;
        $language->fill($request->all());
        $language->save();
    }

    public function editLanguage($request, $id): void
    {
        $language = self::find($id);
        $language->fill($request->all());
        $language->update($request->all());
    }

    public function removeLanguage($id): void
    {
        self::find($id)->delete();
    }

    public function getFlagImage(): string
    {
        if ($this->flag_image_id === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->flag_image->image_category->title
            .'/'. $this->flag_image->image;
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

    public function toggleActive($id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
    }

}
