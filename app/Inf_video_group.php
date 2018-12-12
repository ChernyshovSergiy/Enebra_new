<?php

namespace App;

use App\Traits\Methods\BuildJson;
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
 */
class Inf_video_group extends Model
{
    use MenuId, BuildJson;

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

    public function addInfVideoGroup($request): void
    {
        $video_group = new static;
        $video_group->fill($request->all());
        $video_group->content = $video_group->setJson($request, $video_group->text_blocks);
        $video_group->save();
    }

    public function editInfVideoGroup($request): void
    {
        $this->fill($request->all());
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->update($request->all());
    }

    public function removeInfVideoGroup() :void
    {
        $this->delete();
    }
}
