<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_video_group
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $meta_desc
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_video_group extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'keywords', 'meta_desc', 'language_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function getLanguage()
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function setLanguage($id)
    {
        if ($id == null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }
}
