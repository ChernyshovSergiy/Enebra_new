<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_plan_section_point
 *
 * @property int|null $phase_id
 * @property int|null $language_id
 * @property int|null $section_id
 * @property int $is_done
 * @property-read \App\Inf_plan_phase $phase
 * @property-read \App\Language $language
 * @property-read \App\Inf_plan_phase_section $section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereIsDone($value)
 * @property int $id
 * @property string $point
 * @property string|null $description
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_section_point whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_section_point extends Model
{
    const IS_NOT_DONE = 0;
    const IS_DONE = 1;

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function phase()
    {
        return $this->hasOne(Inf_plan_phase::class, 'id', 'phase_id');
    }

    public function section()
    {
        return $this->hasOne(Inf_plan_phase_section::class, 'id', 'section_id');
    }


    protected $fillable = [
        'point',
        'description',
        'phase_id',
        'section_id',
        'sort',
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

    public function getPhase()
    {
        return ($this->phase != null)
            ? $this->phase->title
            : 'don`t have phase';
    }

    public function setPhase($id)
    {
        if ($id == null){
            return;
        }
        $this->phase_id = $id;
        $this->save();
    }

    public function getSection()
    {
        return ($this->section != null)
            ? $this->section->sub_title
            : 'don`t have section';
    }

    public function setSection($id)
    {
        if ($id == null){
            return;
        }
        $this->section_id = $id;
        $this->save();
    }

    public function setDone()
    {
        $this->is_done = Inf_plan_section_point::IS_DONE;
        $this->save();
    }

    public function setNotDone()
    {
        $this->is_done = Inf_plan_section_point::IS_NOT_DONE;
        $this->save();
    }

    public function toggleDone($value)
    {
        if ($value == null)
        {
            return $this->setNotDone();
        }

        return $this->setDone();
    }
}
