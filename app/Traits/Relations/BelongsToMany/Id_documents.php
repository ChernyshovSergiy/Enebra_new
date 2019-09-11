<?php

namespace App\Traits\Relations\BelongsToMany;


use App\Models\Inf_id_document;

trait Id_documents
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function id_documents()
    {
        return $this->belongsToMany(
            Inf_id_document::class,
            'country_id_documents',
            'country_id',
            'document_id'
        );
        //$country->idDocuments //get all uses documents for own country
    }
}