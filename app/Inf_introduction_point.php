<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_introduction_point
 *
 * @property int $id
 * @property string $point
 * @property string|null $link
 * @property int $sort
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_introduction_point whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
