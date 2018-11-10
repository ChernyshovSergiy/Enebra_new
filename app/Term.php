<?php

namespace App;

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
 * @property-read \App\Language $language
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
 */
class Term extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }
}
