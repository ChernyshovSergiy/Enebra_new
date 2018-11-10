<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_plan_phase
 *
 * @property int $id
 * @property string $title
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_phase extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    protected $fillable = [
        'title',
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
