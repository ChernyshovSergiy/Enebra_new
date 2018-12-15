<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\HasOne\Images;
use App\Traits\Relations\HasOne\VideoGroups;
use App\Traits\Relations\HasOne\VideoGroupSections;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



/**
 * App\Inf_video
 *
 * @property int $id
 * @property mixed|null $info
 * @property int $video_group_id
 * @property int|null $video_group_section_id
 * @property int $image_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Image $images
 * @property-read \App\Inf_video_group $video_group
 * @property-read \App\Inf_video_group_section $video_group_section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereVideoGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video whereVideoGroupSectionId($value)
 * @mixin \Eloquent
 */
class Inf_video extends Model
{
    use Images, VideoGroups, VideoGroupSections, BuildJson;

    protected $fillable = [
        'info', 'sort',
        'video_group_id',
        'video_group_section_id',
        'image_id'
    ];

    public $text_blocks = [
        'title',
        'description',
        'about_author',
        'link',
        'duration_time'
    ];

    public function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function getVideoGroup()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->video_group_id !== null)
            ? json_decode($this->video_group->menu->title)->$locale
            : 'don`t have video group';
    }

    public function getVideoGroupSection()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->video_group_section_id !== null)
            ? json_decode($this->video_group_section->title)->$locale
            : 'don`t have video group section';
    }

    public function getImageIdTitle() :string
    {
        return ($this->image_id !== null)
            ? $this->images->image_category->title
            : 'don`t have category';
    }

    public function getImage(): string
    {
        $image = Image::find($this->image_id);
        if ($image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getImageIdTitle() .'/'. $this->images->image;
    }

    public function addNewVideo($fields) :void
    {
        $infVideo = new static;
        $infVideo->fill($fields->all());
        $infVideo->info = $infVideo->setJson($fields, $infVideo->text_blocks);
        $infVideo->save();
    }

    public function editVideo($fields) :void
    {
        $this->fill($fields->all());
        $this->info = $this->setJson($fields, $this->text_blocks);
        $this->update($fields->all());
    }

    public function removeVideo() :void
    {
        $this->delete();
    }
}
