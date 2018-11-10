<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_plan_phase_section
 *
 * @property int $id
 * @property string $sub_title
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase_section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase_section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase_section whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase_section whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase_section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_phase_section extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    protected $fillable = [
        'sub_title',
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
