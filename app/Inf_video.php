<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_video
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $about_author
 * @property string $link
 * @property string $duration_time
 * @property int $video_group_id
 * @property int $video_group_section_id
 * @property int $image_id
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $sort
 * @property-read \App\Image $image
 * @property-read \App\Language $language
 * @property-read \App\Inf_video_group $video_group
 * @property-read \App\Inf_video_group_section $video_group_section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereAboutAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereDurationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereVideoGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereVideoGroupSectionId($value)
 * @mixin \Eloquent
 */
class Inf_video extends Model
{
    public function video_group()
    {
        return $this->hasOne(Inf_video_group::class, 'id', 'video_group_id');
    }

    public function video_group_section()
    {
        return $this->hasOne(Inf_video_group_section::class, 'id', 'video_group_section_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class,'id', 'image_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    protected $fillable = [
        'title', 'description', 'about_author', 'link',
        'duration_time', 'language_id', 'sort',
        'video_group_id', 'video_group_section_id', 'image_id'
    ];

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

    public function getVideoGroupSection()
    {
        return ($this->video_group_section != null)
            ? $this->video_group_section->title
            : 'don`t have video group section';
    }

    public function setVideoGroupSection($id)
    {
        if ($id == null){
            return;
        }
        $this->video_group_section_id = $id;
        $this->save();
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
        $image = Image::find($this->image_id);
        if ($image == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getImageIdTitle() .'/'. $this->image->image;
    }

    public function setImage($id)
    {
        if ($id == null){
            return;
        }
        $this->image_id = $id;
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
