<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang;

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
        $titles = Menu::pluck( 'title', 'id')->all();
        foreach($titles as $key => $title){
            $page_names[$key] = Lang::get('nav'.'.'.$title);
        };
        array_unshift($page_names, Lang::get('nav.root'));

        return $page_names;
    }

    public function getParent()
    {
        if ($this->parent == 0){
            return '';
//            return Lang::get('nav.root');
        }
        $title = $this->where('id', $this->parent)->first();
        return Lang::get('nav.'. $title->title);
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

}
