<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasOne\ConstSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Const_article
 *
 * @property int $id
 * @property mixed|null $article
 * @property int $const_sections_id
 * @property int $sort
 * @property int $side
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Const_section $const_section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereConstSectionsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Const_article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Const_article extends Model
{
    use ConstSection, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'article',
        'const_sections_id',
        'side',
        'sort'
    ];

    public function getSectionTitle():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return ($this->const_sections_id !== null)
            ? json_decode($this->const_section->title)->$locale
            : '';
    }

    public function getPointSide():string
    {
        return ($this->side === 0)
            ? Lang::get('app.left')
            : Lang::get('app.right');
    }

    public function addArticleTest($request):void
    {
        $this->fill($request->all());
        $this->article = json_encode($this->createLangString($request, 'article'));
        $this->save();
    }

    public function addArticle($request):void
    {
        $article = new static;
        $article->fill($request->all());
        $article->article = json_encode($article->createLangString($request, 'article'));
        $article->save();
    }

    public function editArticle($request, $id):void
    {
        $article = self::find($id);
        $article->fill($request->all());
        $article->article = json_encode($article->createLangString($request, 'article'));
        $article->update($request->all());
    }

    public function removeArticle($id):void
    {
        self::find($id)->delete();
    }
}
