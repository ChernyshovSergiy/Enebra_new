<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_id_document extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

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

    protected $fillable = [
        'name',
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
}
