<?php

namespace App;

use App\Traits\Methods\BuildJson;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Term
 *
 * @property int $id
 * @property string $title
 * @property string|null $left_textarea
 * @property string|null $right_textarea
 * @property string|null $down_textarea
 * @property int $views_count
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereDownTextarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereLeftTextarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereRightTextarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereViewsCount($value)
 * @mixin \Eloquent
 * @property mixed|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Term whereContent($value)
 */
class Term extends Model
{
    use BuildJson;

    protected $fillable = [
        'content',
        'views_count'
    ];

    public $text_blocks = [
        'title',
        'left_textarea',
        'right_textarea',
        'down_textarea'
    ];

    public function getTextColumnsForTranslate(): array
    {
        return (new static)->text_blocks;
    }

    public function addContent($request): void
    {
        $term = new static;
        $term->fill($request->all());
        $term->content = $term
            ->setJson($request, $term->text_blocks);
        $term->save();
    }

    public function editContent($request, $id): void
    {
        $term = self::find($id);
        $term->fill($request->all());
        $term->setContent($request, $id);
        $term->update($request->all());
    }

    public function setContent($request, $id): void
    {
        if ($id === null) {
            return;
        }
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->save();
    }

    public function removeContent($id): void
    {
        self::find($id)->delete();
    }
}
