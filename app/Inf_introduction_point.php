<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use DB;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Inf_introduction_point
 *
 * @property int $id
 * @property mixed|null $point
 * @property int $link_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_introduction_point extends Model
{
    use PrepareLangStrForJsonMethods;
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'link_id');
    }

    protected $fillable = [
        'point',
        'link_id',
        'sort'
    ];

    public function getLinkPageTitle()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->link_id != null)
            ? json_decode($this->menu->title)->$locale
            : 'don`t have language';
    }

    public function setLinkIDPageTitle($id)
    {
        if ($id == null){
            return;
        }
        $this->link_id = $id;
        $this->save();
    }

    public static function addPoint($request) :void //add new point
    {
        $intro_point = new static;
        $intro_point->fill($request->all());
        $intro_point->point = json_encode($intro_point->createLangString($request, 'point'));
        $intro_point->save();
    }

    public static function editPoint($request, $id) :void
    {
        $intro_point = Inf_introduction_point::find($id);
        $intro_point->fill($request->all());
        $intro_point->point = json_encode($intro_point->createLangString($request, 'point'));
        $intro_point->update($request->all());
    }

    public static function removePoint($id) :void
    {
        Inf_introduction_point::find($id)->delete();
    }

    public static function build()
    {
        $result = Inf_introduction_point::all();
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = 'point';
            if (is_string($item->$column) &&
                is_object(json_decode($item->$column)) &&
                json_last_error() == JSON_ERROR_NONE){

                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }

}
