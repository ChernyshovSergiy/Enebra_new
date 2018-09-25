<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inf_video_group extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'description', 'keywords', 'meta_desc', 'meta_id', 'language_id'
    ];

    protected $hidden = [
        'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }
}
