<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Methods\GetTitleFromMenu;
use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasMany\ConstSections;
use App\Traits\Relations\HasMany\DescBlocks;
use App\Traits\Relations\HasMany\Descriptions;
use App\Traits\Relations\HasMany\FaqQuestions;
use App\Traits\Relations\HasMany\Purposes;
use App\Traits\Relations\HasMany\Titles;
use App\Traits\Relations\HasMany\WhatToDoPoints;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Purpose[] $purpose
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Description[] $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Desc_block[] $desc_block
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\WhatToDoPoint[] $what_to_do_points
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Const_section[] $const_sections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Faq_question[] $faq_questions
 */
class Menu extends Model
{
    use BuildJson,
        PrepareLangStrForJsonMethods,
        Titles, GetTitleFromMenu,
        Purposes,
        DescBlocks,
        ConstSections,
        WhatToDoPoints,
        FaqQuestions;

    protected $fillable = [
        'id',
        'title',
        'url',
        'parent',
        'sort'
    ];

    public function getVideoMenuPoint($name)
    {
        return $this->getActiveVideoMenuPoint($name);
    }

    public function getPageMenuPoint($name)
    {
        return $this->getActivePageMenuPoint($name);
    }

    public static function getMenuPointName() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
//            if (($key = array_search('home', $page_names)) !== false){
//                unset($page_names[$key]);
//            };

        }
        array_unshift($page_names, Lang::get('nav.root'));

        return $page_names;
    }

    public function getParent() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($this->parent === 0){
            return '';
        }
        $title = self::where('id', $this->parent)->first();
        if (!empty($title)) {
            return json_decode($title->title)->$locale;
        }
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

    public function toggleActive($id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
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
        $menu = self::find($id);
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->update($request->all());
    }

    public static function removeMenuPoint($id) :void
    {
        self::where('parent', $id)->update(array('parent' => 0));

        self::find($id)->delete();
    }
}
