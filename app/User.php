<?php

namespace App;

use App\Traits\Relations\HasMany\Images;
use App\Traits\Relations\HasMany\InfPages;
use App\Traits\Relations\HasMany\Languages;
use App\Traits\Relations\HasMany\UserFAQAnswers;
use App\Traits\Relations\HasMany\UserFaqQuestions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\User
 *
 * @property int $id
 * @property string|null $parent_referral_id
 * @property int $citizen_country_id
 * @property int $biometric_photo_id
 * @property string $first_name
 * @property string $last_name
 * @property string $first_name_en
 * @property string $last_name_en
 * @property int $sex_id
 * @property int $birth_country_id
 * @property int $document_id
 * @property string $document_number
 * @property int $birth_day
 * @property int $birth_month
 * @property string $birth_year
 * @property string $phone
 * @property string $email
 * @property string|null $login
 * @property string $password
 * @property int|null $avatar_id
 * @property string|null $remember_token
 * @property int $role_id
 * @property int $status_id
 * @property string $referral_id
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Language[] $language
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_page[] $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBiometricPhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCitizenCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereParentReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable,
        Languages,
        InfPages,
        Images,
        UserFAQAnswers,
        UserFaqQuestions;

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

    public function getUserNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $lang_id = Language::whereSlug($locale)->first();
        $users = self::all();
        $user_names = [];
        foreach($users as $user){
            if ($lang_id->id === $user->language_id){
                $user_names[$user->id] = $user->first_name. ' '. $user->last_name;
            } else{
                $user_names[$user->id] = $user->first_name_en. ' '. $user->last_name_en;
            }
        }
        return $user_names;
    }

    public static function getFullName($id) :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $lang_id = Language::whereSlug($locale)->first();
        $user = self::find($id);
        if ($lang_id->id === $user->language_id){
            return $user->first_name. ' '. $user->last_name;
        }
        return $user->first_name_en. ' '. $user->last_name_en;


    }
}
