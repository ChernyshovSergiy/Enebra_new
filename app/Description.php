<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasOne\MenuId;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Description
 *
 * @property int $id
 * @property mixed|null $text_block
 * @property int $menu_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereTextBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Description extends Model
{
    use MenuId, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'text_block',
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

    public function addTextBlock($request):void
    {
        $textBlock = new static;
        $textBlock->fill($request->all());
        $textBlock->text_block = json_encode($textBlock->createLangString($request, 'text_block'));
        $textBlock->save();
    }

    public function editTextBlock($request, $id):void
    {
        $textBlock = self::find($id);
        $textBlock->fill($request->all());
        $textBlock->text_block = json_encode($textBlock->createLangString($request, 'text_block'));
        $textBlock->update($request->all());
    }

    public function removeTextBlock($id):void
    {
        self::find($id)->delete();
    }
}
