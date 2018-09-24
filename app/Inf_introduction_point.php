<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Inf_introduction_point extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
    }

    public static function getIntroductionPoints($language_id)
    {
        return DB::table('inf_introduction_points')->orderBy('sort', 'asc')->where($language_id)->get();
    }

}
