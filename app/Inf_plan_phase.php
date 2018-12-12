<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Inf_plan_phase
 *
 * @property int $id
 * @property mixed|null $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Country[] $Countries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_plan_phase whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_plan_phase extends Model
{
    use Countries, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'title'
    ];

    public function createPlanPhase($request) :void
    {
        $planPhase = new static;
        $planPhase->fill($request->all());
        $items = $this->createLangString($request, 'title');
        $planPhase->title = json_encode($items);
        $planPhase->save();
    }

    public function editPlanPhase($request, $model) :void
    {
        $items = $this->createLangString($request, 'title');
        $model->title = json_encode($items);
        $model->update($request->all());
    }

    public function getPhaseNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();
        $phase_names = [];
        foreach($titles as $key => $title){
            $phase_names[$key] = json_decode($title)->$locale;
        }
        return $phase_names;
    }

    public function removePlanPhase():void
    {
        $this->delete();
    }

}
