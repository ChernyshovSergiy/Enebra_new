<?php

namespace App\Traits\Relations\BelongsToMany;


use App\Country;

trait Countries
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function Countries()
    {
        return $this->belongsToMany(
            Country::class,
            'country_id_documents',
            'document_id',
            'country_id'
        );
        //$inf_id_document->Countries //Get list of countries that use this document
    }
}