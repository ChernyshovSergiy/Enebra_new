<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Inf_video_group_section
 *
 * @property int|null $video_group_id
 * @property int|null $language_id
 * @property-read \App\Inf_video_group $video_group
 * @property-read \App\Language $language
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereVideoGroupId($value)
 * @mixin \Eloquent
 */
class Inf_video_group_section extends Model
{
    protected $fillable = [
        'title', 'video_group_id'
    ];

    public function video_group()
    {
        return $this->belongsTo(Inf_video_group::class, 'video_group_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function getVideoGroup()
    {
        return ($this->video_group != null)
            ? $this->video_group->title
            : 'don`t have video group';
    }

    public function getVideoGroupLanguageId()
    {
        return ($this->video_group != null)
            ? $this->video_group->language_id
            : 'don`t have language';
    }

    public function setVideoGroup($id)
    {
        if ($id == null){
            return;
        }
        $this->video_group_id = $id;
        $this->save();
    }

    public function getLanguage()
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function setLanguage()
    {
        $this->language_id = $this->getVideoGroupLanguageId();
        $this->save();
    }
}
