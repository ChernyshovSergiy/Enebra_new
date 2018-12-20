<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsTo\VideoGroups;
use App\Traits\Relations\HasMany\Videos;
use App\Traits\Relations\HasMany\VideoSection;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class Inf_video_group_section extends Model
{
    use PrepareLangStrForJsonMethods, VideoGroups, VideoSection;

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

    public function getVideoGroupSectionNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();
        $video_group_section_names = [];
        foreach($titles as $key => $title){
            $video_group_section_names[$key] = json_decode($title)->$locale;
        }
        return $video_group_section_names;
    }

    public function removeVideoGroupSection() :void
    {
        $this->delete();
    }

}
