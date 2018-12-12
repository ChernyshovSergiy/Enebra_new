<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\HasOne\Menus;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Inf_introduction
 *
 * @property int $id
 * @property int $title_id
 * @property mixed $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_introduction extends Model
{
    use Menus, BuildJson;

    protected $fillable = [
        'title_id',
        'content'
    ];
    protected $text_blocks = [
        'sub_title',
        'text',
        'replica',
        'conclusion'
    ];

    public static function getTextColumnsForTranslate(): array
    {
        return (new static)->text_blocks;
    }

    public static function addContent($request): void
    {
        $introduction = new static;
        $introduction->fill($request->all());
        $introduction->content = $introduction
            ->setJson($request, $introduction->text_blocks);
        $introduction->save();
    }

    public static function editContent($request, $id): void
    {
        $introduction = self::find($id);
        $introduction->fill($request->all());
        $introduction->setContent($request, $id);
        $introduction->update($request->all());
    }

    public function setContent($request, $id): void
    {
        if ($id === null) {
            return;
        }
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->save();
    }

    public function getTitleFromMenu(): string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->title_id !== null)
            ? json_decode($this->menu->title)->$locale
            : 'don`t have language';
    }

    public function removeContent(): void
    {
        $this->delete();
    }
}
