<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Inf_id_document
 *
 * @property int $id
 * @property mixed|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Country[] $Countries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_id_document extends Model
{
    use Countries, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'name'
    ];
    public function editDoc($request, $model)
    {
        $items = $this->createLangString($request, 'name');
        $model->name = json_encode($items);
        $model->update($request->all());
    }
}
