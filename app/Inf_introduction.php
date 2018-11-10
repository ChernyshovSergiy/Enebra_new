<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_introduction
 *
 * @property int $id
 * @property string $title
 * @property string $sub_title
 * @property string $text
 * @property string $replica
 * @property string $conclusion
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereConclusion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereReplica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_introduction extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    protected $fillable = [
        'title',
        'sub_title',
        'text',
        'replica',
        'conclusion',
        'language_id'
    ];

    public function getLanguage()
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function setLanguage($id)
    {
        if ($id == null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }
}
