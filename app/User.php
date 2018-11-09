<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'parent_referral_id', 'citizen_country_id',
        'biometric_photo_id', 'first_name', 'last_name',
        'first_name_en', 'last_name_en', 'sex',
        'birth_country_id', 'document_id', 'document_number',
        'birth_day', 'birth_month', 'birth_year', 'phone',
        'email', 'login', 'avatar_id', 'role_id', 'status_id',
        'referral_id', 'language_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function language()
    {
        return $this->hasMany(Language::class, 'id', 'language_id');
    }

    public function page()
    {
        return $this->hasMany(Inf_page::class, 'id', 'user_id');
    }
}
