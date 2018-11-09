<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function title()
    {
        return $this->hasOne(Inf_page::class, 'id', 'title_id');
    }

    protected $fillable = [
        'title',
        'url',
        'parent',
        'sort',
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

    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive()
    {
        if ($this->is_active == 0)
        {
            return $this->active();
        }
        return $this->notActive();
    }

}
