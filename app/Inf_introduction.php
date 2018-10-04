<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_introduction extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    protected $fillable = [
        'title',
        'sub_title',
        'text',
        'replica',
        'conclusion',
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
