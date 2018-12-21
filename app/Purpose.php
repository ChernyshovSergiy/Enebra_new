<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Purpose
 *
 * @property int $id
 * @property mixed|null $goal
 * @property int $menu_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Purpose whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Purpose extends Model
{
    use MenuId, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'goal',
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

    public function addGoal($request):void
    {
        $goal = new static;
        $goal->fill($request->all());
        $goal->goal = json_encode($goal->createLangString($request, 'goal'));
        $goal->save();
    }

    public function editGoal($request, $id):void
    {
        $goal = self::find($id);
        $goal->fill($request->all());
        $goal->goal = json_encode($goal->createLangString($request, 'goal'));
        $goal->update($request->all());
    }

    public function removeGoal($id):void
    {
        self::find($id)->delete();
    }
}
