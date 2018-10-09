<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_plan_phase extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    protected $fillable = [
        'title',
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
