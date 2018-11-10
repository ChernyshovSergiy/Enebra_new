<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_contact_message
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property int $status_id
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @property-read \App\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_contact_message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_contact_message extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
