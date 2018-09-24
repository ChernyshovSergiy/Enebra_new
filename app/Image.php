<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

/**
 * @property int user_id
 * @property  string title
 * @property array slug
 */
class Image extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title', 'slug'
    ];

    public function uploadImage($image)
    {
        Storage::delete('uploads/'. $this->image);
        $filename = $this->slug.'.'.$image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->slug == null){
            return '/img/no-image.png';
        }
        return '/uploads/'.$this->slug;
    }
}
