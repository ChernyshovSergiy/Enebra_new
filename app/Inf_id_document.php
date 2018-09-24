<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_id_document extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }

    public function Countries()
    {
        return $this->belongsToMany(
            Country::class,
            'country__id_documents',
            'document_id',
            'country_id'
        );
        //$inf_id_document->Countries //Get list of countries that use this document
    }
}
