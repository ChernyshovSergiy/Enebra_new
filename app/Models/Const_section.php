<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasMany\ConstArticles;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Const_section
 *
 * @property int $id
 * @property mixed|null $title
 * @property int $menu_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Const_article[] $const_articles
 * @property-read \App\Models\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Const_section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Const_section extends Model
{
    use MenuId, PrepareLangStrForJsonMethods, ConstArticles;

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

    public function getSectionNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();
        $section_names = [];
        foreach($titles as $key => $title){
            $section_names[$key] = substr(json_decode($title)->$locale, 3,-4);
        }
        return $section_names;
    }

    public function addSection($request):void
    {
        $section = new static;
        $section->fill($request->all());
        $section->title = json_encode($section->createLangString($request, 'title'));
        $section->save();
    }

    public function editSection($request, $id):void
    {
        $section = self::find($id);
        $section->fill($request->all());
        $section->title = json_encode($section->createLangString($request, 'title'));
        $section->update($request->all());
    }

    public function removeSection($id):void
    {
        self::find($id)->delete();
    }
}
