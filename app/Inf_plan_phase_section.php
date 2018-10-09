<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inf_plan_phase_section extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    protected $fillable = [
        'sub_title',
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
