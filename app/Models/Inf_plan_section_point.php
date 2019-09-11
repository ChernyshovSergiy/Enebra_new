<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\HasOne\Phases;
use App\Traits\Relations\HasOne\Sections;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Inf_plan_section_point
 *
 * @property int $id
 * @property int $phase_id
 * @property int $section_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $is_done
 * @property mixed|null $entry
 * @property-read \App\Models\Inf_plan_phase $phase
 * @property-read \App\Models\Inf_plan_phase_section $section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereEntry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_section_point whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_section_point extends Model
{
    use Phases, Sections, BuildJson;

    public const IS_NOT_DONE = 0;
    public const IS_DONE = 1;

    protected $fillable = [
        'is_done',
        'entry',
        'phase_id',
        'section_id',
        'sort'
    ];

    protected $text_blocks = [
        'point',
        'description'
    ];

    public function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function addPlanPoint($request): void
    {
        $plan_point = new static;
        $plan_point->fill($request->all());
        $plan_point->is_done = $request->get('is_done') ? self::IS_DONE : self::IS_NOT_DONE;
        $plan_point->entry = $plan_point->setJson($request, $plan_point->text_blocks);
        $plan_point->save();
    }

    public function editPlanPoint($request, $id): void
    {
        $plan_point = self::find($id);
        $plan_point->fill($request->all());
        $plan_point->is_done = $request->get('is_done') ? self::IS_DONE : self::IS_NOT_DONE;
        $plan_point->entry = $plan_point->setJson($request, $this->text_blocks);
        $plan_point->update($request->all());
    }

    public function getPhase() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->phase !== null)
            ? json_decode($this->phase->title)->$locale
            : '';
    }

    public function getSection() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->section !== null)
            ? json_decode($this->section->sub_title)->$locale
            : '';
    }

    public function setDone(): void
    {
        $this->is_done = self::IS_DONE;
        $this->save();
    }

    public function setNotDone(): void
    {
        $this->is_done = self::IS_NOT_DONE;
        $this->save();
    }

    public function toggleDone($id)
    {
        $toggle = self::find($id);
        if ($toggle->is_done === 0)
        {
            return $toggle->setDone();
        }
        return $toggle->setNotDone();
    }

    public function removePlanPoint($id) :void
    {
        self::find($id)->delete();
    }
}
