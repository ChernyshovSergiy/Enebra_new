<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\HasOne\VideoGroups;
use App\Traits\Relations\HasOne\VideoGroupSections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Inf_video
 *
 * @property int $id
 * @property mixed|null $info
 * @property int $video_group_id
 * @property int|null $video_group_section_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Inf_video_group $video_group
 * @property-read \App\Models\Inf_video_group_section $video_group_section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereVideoGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_video whereVideoGroupSectionId($value)
 * @mixin \Eloquent
 */
class Inf_video extends Model
{
    use VideoGroups, VideoGroupSections, BuildJson;

    public function video_group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inf_video_group::class, 'id', 'video_group_id');
    }

    protected $fillable = [
        'info', 'sort',
        'video_group_id',
        'video_group_section_id'
    ];

    public $text_blocks = [
        'title',
        'description',
        'about_author',
        'link',
        'duration_time',
        'image_id'
    ];

    public function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function getVideoGroup() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->video_group_id !== null)
            ? json_decode($this->video_group->menu->title)->$locale
            : Lang::get('admin.not_video_group');
    }

    public function getVideoGroupSection() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->video_group_section_id !== null)
            ? json_decode($this->video_group_section->title)->$locale
            : Lang::get('admin.not_video_section');
    }

    public function getImageId($path) :int
    {
        if($path === ''){
            return null;
        }
        return Image::whereImage(explode('/', $path)[3])->firstOrFail()->id;
    }

    public function addNewVideo($fields) :void
    {
        $infVideo = new static;
        $infVideo->fill($fields->all());
        $infVideo->info = $infVideo->setJson($fields, $infVideo->text_blocks);
        $infVideo->save();
    }

    public function editVideo($fields, $id) :void
    {
        $infVideo = self::find($id);
        $infVideo->fill($fields->all());
        $infVideo->info = $infVideo->setJson($fields, $this->text_blocks);
        $infVideo->update($fields->all());
    }

    public function removeVideo($id) :void
    {
        self::find($id)->delete();
    }

}
