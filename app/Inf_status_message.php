<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_status_message
 *
 * @property int $id
 * @property string $title
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_status_message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_status_message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_status_message whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_status_message whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_status_message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_status_message extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

}
