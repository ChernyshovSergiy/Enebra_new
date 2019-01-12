<?php

namespace App;

use App\Traits\Relations\BelongsTo\Authors;
use App\Traits\Relations\BelongsTo\ImagesCategories;
use App\Traits\Relations\HasOne\SocialLinks;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Image
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $category_id
 * @property string $image
 * @property-read \App\User|null $author
 * @property-read \App\ImageCategory $image_category
 * @property-read \App\socialLink $socialLink
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUserId($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    use Sluggable, ImagesCategories, Authors, SocialLinks;

    protected $fillable = [
        'title',
        'image',
        'category_id',
        'user_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function addImage($request)
    {
        $image = new static;
        $image->fill($request->all());
        $image->save();
        $image->uploadImage($request->file('image'));
        $image->user_id = $request->user_id ?? Auth::user()->id;
        $image->save();

        return $image;
    }

    public function clearPreviousEntry($request, $id): void
    {
        $image = self::find($id);
        $image->removeImage();
        $image->title = $request->title;
        $image->slug = null;
        $image->save();
    }

    public function editImage($fields, $id): void
    {
        $image = self::find($id);
        $image->fill($fields->all());
        $image->save();
        $image->uploadImage($fields->file('image'));
        $image->save();
    }

    public function removeImage(): void
    {
        if ($this->image !== null) {
            Storage::delete('/uploads/'. $this->getCategoryIdTitle() .'/'. $this->image); // delete previous image
        }
    }

    public function remove($id): void
    {
        $image = self::find($id);
        $image->removeImage(); // delete image
        $image->delete();
    }

    public function uploadImage($image): void
    {
        if($image === null)
        {
            return;
        }
        $this->removeImage();

        $filename = $this->slug.'.'.$image->extension();
        $image->storeAs('uploads/'. $this->getCategoryIdTitle(), $filename);
        $this->image = $filename;
        $this->make();
    }

    public function getImage(): string
    {
        if ($this->image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getCategoryIdTitle() .'/'. $this->image;
    }

    public function getCategoryIdTitle(): string
    {
        return ($this->image_category !== null)
            ? $this->image_category->title
            : 'don`t have category';
    }

    public function getUserName():string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($this->author->language->first()->slug === $locale) {
            return ($this->user_id !== null)
                ? $this->author->first_name . ' ' . $this->author->last_name
                : '';
        }

        return ($this->user_id !== null)
            ? $this->author->first_name_en . ' ' . $this->author->last_name_en
            : '';
    }

}
