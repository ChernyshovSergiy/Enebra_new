<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Methods\GetTitleFromMenu;
use App\Traits\Relations\HasMany\VideoGroupSections;
use App\Traits\Relations\HasMany\Videos;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Inf_video_group
 *
 * @property int $id
 * @property int|null $menu_id
 * @property mixed|null $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_video_group whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_video_group_section[] $video_group_sections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_video[] $videos
 */
class Inf_video_group extends Model
{
    use Videos, VideoGroupSections, MenuId, BuildJson, GetTitleFromMenu;

    protected $fillable = [
        'menu_id',
        'content'
    ];

    public $text_blocks = [
        'description',
        'keywords',
        'meta_desc'
    ];

    public function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function getTitle() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->menu_id !== null)
            ? json_decode($this->menu->title)->$locale
            : '';
    }

    public function getVideoGroupNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'menu_id', 'id')->all();
        $video_group_names = [];
        foreach($titles as $key => $title){
            $video_group_names[$key] = json_decode(Menu::where('id', $title)->first()->title)->$locale;
        }
        return $video_group_names;
    }

    public function getVideoGroup($slag)
    {
        return $this->build(self::getModel(), 'content')
            ->where('menu_id', '=', $this->getActiveVideoMenuPoint($slag)->id)->first();
    }

    public function getBG() :string
    {
        return ($this->menu_id !== null)
            ? explode('/', $this->menu->url)[3]
            : '';
    }

    public function addInfVideoGroup($request): void
    {
        $video_group = new static;
        $video_group->fill($request->all());
        $video_group->content = $video_group->setJson($request, $video_group->text_blocks);
        $video_group->save();
    }

    public function editInfVideoGroup($request, $id): void
    {
        $video_group = self::find($id);
        $video_group->fill($request->all());
        $video_group->content = $this->setJson($request, $this->text_blocks);
        $video_group->update($request->all());
    }

    public function removeInfVideoGroup($id) :void
    {
        self::find($id)->delete();
    }
}
