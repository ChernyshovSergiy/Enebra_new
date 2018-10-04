<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Inf_introduction_point extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public static function getIntroductionPoints($language_id)
    {
        return DB::table('inf_introduction_points')->orderBy('sort', 'asc')->where($language_id)->get();
    }


    protected $fillable = [
        'point',
        'link',
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

}
