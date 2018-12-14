<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsTo\VideoGroups;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Inf_video_group_section
 *
 * @property int $id
 * @property mixed|null $title
 * @property int $video_group_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Inf_video_group $video_group
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group_section whereVideoGroupId($value)
 * @mixin \Eloquent
 */
class Inf_video_group_section extends Model
{
    use PrepareLangStrForJsonMethods, VideoGroups;

    protected $fillable = [
        'title',
        'video_group_id'
    ];

    public function createNewVideoGroupSection($request) :void
    {
        $video_group_section = new static;
        $video_group_section->fill($request->all());
        $items = $video_group_section->createLangString($request, 'title');
        $video_group_section->title = json_encode($items);
        $video_group_section->save();
    }

    public function editVideoGroupSection($request, $id) :void
    {
        $video_group_section = self::find($id);
        $video_group_section->fill($request->all());
        $items = $video_group_section->createLangString($request, 'title');
        $video_group_section->title = json_encode($items);
        $video_group_section->update($request->all());
    }

    public function getVideoGroup()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->video_group_id !== null)
            ? json_decode($this->video_group->menu->title)->$locale
            : 'don`t have video group';
    }

    public function removeVideoGroupSection() :void
    {
        $this->delete();
    }

}
