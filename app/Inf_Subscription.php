<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  string email
 * @property string token
 */
class Inf_Subscription extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public static function add($email)
    {
        $sub = new static;
        $sub->email = $email;
        $sub->save();

        return $sub;
    }

    public function generateToken()
    {
        $this->token = str_random(100);
        $this->save();

    }

    public function remove()
    {
        $this->delete();
    }
}
