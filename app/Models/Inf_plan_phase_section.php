<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use App\Traits\Relations\HasMany\PlanSections;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Inf_plan_phase_section
 *
 * @property int $id
 * @property mixed $sub_title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Country[] $Countries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inf_plan_section_point[] $plan_points
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase_section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase_section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase_section whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase_section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_phase_section extends Model
{
    use PlanSections, Countries, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'sub_title'
    ];

    public function createNewPhaseSection($request) :void
    {
        $plan_phase_section = new static;
        $plan_phase_section->fill($request->all());
        $items = $plan_phase_section->createLangString($request, 'sub_title');
        $plan_phase_section->sub_title = json_encode($items);
        $plan_phase_section->save();
    }

    public function editPhaseSection($request, $id) :void
    {
        $plan_phase_section = self::find($id);
        $plan_phase_section->fill($request->all());
        $items = $plan_phase_section->createLangString($request, 'sub_title');
        $plan_phase_section->sub_title = json_encode($items);
        $plan_phase_section->update($request->all());
    }

    public function getSectionNames(): array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'sub_title', 'id')->all();
        $section_names = [];
        foreach($titles as $key => $title){
            $section_names[$key] = json_decode($title)->$locale;
        }
        return $section_names;
    }

    public function removePhaseSection($id) :void
    {
        self::find($id)->delete();
    }
}
