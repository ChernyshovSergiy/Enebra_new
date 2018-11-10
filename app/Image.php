<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

/**
 * App\Image
 *
 * @property int user_id
 * @property string title
 * @property array slug
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
    use Sluggable;

    public function image_category()
    {
        return $this->belongsTo(ImageCategory::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function socialLink()
    {
        return $this->hasOne(SocialLink::class, 'image_id', 'id');
    }

    protected $fillable = [
        'title',
        'image', 'category_id', 'user_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $image = new static;
        $image->fill($fields);
        $image->user_id = 1;
        $image->save();

        return $image;
    }

    public function edit($fields)
    {
//        dd($fields);
        $this->fill($fields);
        $this->save();

    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('/uploads/'. $this->getCategoryIdTitle() .'/'. $this->image); // delete previous image
        }
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->removeImage(); // delete image
        $this->delete();
    }

    public function uploadImage($image)
    {
        if($image == null)
        {
            return;
        }
        $this->removeImage();

        $filename = $this->slug.'.'.$image->extension();
        $image->storeAs('uploads/'. $this->getCategoryIdTitle(), $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getCategoryIdTitle() .'/'. $this->image;
    }

    public function setCategory($id)
    {
        if ($id == null){
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryIdTitle()
    {
        return ($this->image_category != null)
            ? $this->image_category->title
            : 'don`t have category';
    }

    public function getUserIdName()
    {
        return($this->author != null)
            ? $this->author->first_name
            : 'don`t have author';
    }

}
