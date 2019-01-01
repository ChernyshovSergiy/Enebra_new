<?php

namespace App;

use App\Traits\Relations\HasMany\Descriptions;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Desc_block
 *
 * @property int $id
 * @property string $title
 * @property int $menu_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Desc_block whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Description[] $description
 */
class Desc_block extends Model
{
    use MenuId, Descriptions;

    protected $fillable = [
        'title',
        'menu_id',
        'sort'
    ];

    public function getPageTitle():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return ($this->menu_id !== null)
            ? json_decode($this->menu->title)->$locale
            : '';
    }

    public function getDescBlockNames(): array
    {
        return self::pluck('title','id')->all();
    }

    public function addDescBlock($request):void
    {
        $textBlock = new static;
        $textBlock->fill($request->all());
        $textBlock->save();
    }

    public function editDescBlock($request, $id):void
    {
        $textBlock = self::find($id);
        $textBlock->fill($request->all());
        $textBlock->update($request->all());
    }

    public function removeDescBlock($id):void
    {
        self::find($id)->delete();
    }
}
