<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use Illuminate\Database\Eloquent\Model;


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
