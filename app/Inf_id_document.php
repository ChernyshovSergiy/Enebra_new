<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_id_document
 *
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Country[] $Countries
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_id_document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
