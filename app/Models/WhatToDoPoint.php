<?php

namespace App\Models;

use App\Traits\Methods\GetTitleFromMenu;
use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Models\WhatToDoPoint
 *
 * @property int $id
 * @property mixed|null $point
 * @property int $menu_id
 * @property int $side
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WhatToDoPoint whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WhatToDoPoint extends Model
{
    use MenuId, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'point',
        'menu_id',
        'side',
        'sort'
    ];


    public function getPageTitle():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return ($this->menu_id !== null)
            ? json_decode($this->menu->title)->$locale
            : '';
    }

    public function getPointSide():string
    {
        return ($this->side === 0)
            ? Lang::get('app.left')
            : Lang::get('app.right');
    }

    public function addPoint($request):void
    {
        $point = new static;
        $point->fill($request->all());
        $point->point = json_encode($point->createLangString($request, 'point'));
        $point->save();
    }

    public function editPoint($request, $id):void
    {
        $point = self::find($id);
        $point->fill($request->all());
        $point->point = json_encode($point->createLangString($request, 'point'));
        $point->update($request->all());
    }

    public function removePoint($id):void
    {
        self::find($id)->delete();
    }
}
