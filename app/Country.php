<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }

    public static function getCountries($language_id)
    {
        return self::select('id')->where($language_id)->get();
    }

    public function idDocuments()
    {
        return $this->belongsToMany(
            Inf_id_document::class,
            'country__id_documents',
            'country_id',
            'document_id'
        );
        //$country->idDocuments //get all uses documents for own country
    }
}
