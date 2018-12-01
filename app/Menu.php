<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Menu
 *
 * @property int $id
 * @property \App\Inf_page $title
 * @property int $is_active
 * @property string $url
 * @property int $parent
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $language_id
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Menu whereUrl($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use PrepareLangStrForJsonMethods;

    public function title()
    {
        return $this->hasMany(Inf_page::class, 'title_id', 'id');
    }

    protected $fillable = [
        'id',
        'title',
        'url',
        'parent',
        'sort'
    ];

    public static function getMenuPointName()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = Menu::pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
//            if (($key = array_search('home', $page_names)) !== false){
//                unset($page_names[$key]);
//            };

        };
        array_unshift($page_names, Lang::get('nav.root'));

        return $page_names;
    }

    public function getParent()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($this->parent == 0){
            return '';
        }
        $title = $this->where('id', $this->parent)->first();
//        dd($title);
        return json_decode($title->title)->$locale;
    }

    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive()
    {
        if ($this->is_active == 0)
        {
            return $this->active();
        }
        return $this->notActive();
    }

    public static function addMenuPoint($request) :void//add new page
    {
        $menu = new static;
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->save();
    }

    public static function editMenuPoint($request, $id) :void //add new page
    {
        $menu = Menu::find($id);
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->update($request->all());
    }

    public static function removeMenuPoint($id) :void
    {
        Menu::where('parent', $id)->update(array('parent' => 0));

        Menu::find($id)->delete();
    }
}
