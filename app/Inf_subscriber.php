<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Inf_subscriber
 *
 * @property int $id
 * @property string $email
 * @property string|null $token
 * @property int|null $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_subscriber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Inf_subscriber extends Model
{
    protected $fillable = [
        'email', 'language_id'
    ];
    protected $hidden = [
        'token'
    ];
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function getName()
    {
        if ($this->email !== null){
            $name = User::whereEmail($this->email)->first();
            if ($name !== null){
                return $name->first_name . ' '. $name->last_name;
            }
            return Lang::get('admin.anonymous');
        }

        return redirect()->back()->with('status', 'Почта не указанна');
    }

    public function getStatus()
    {
        if ($this->token === null){
            return Lang::get('status.active');
        }
        return Lang::get('status.wait');
    }

    public static function add($email)
    {
        $sub = new static;
        $sub->email = $email;
        $sub->save();

        return $sub;
    }

    public function generateToken(): void
    {
        $this->token = str_random(100);
        $this->save();
    }
    public function setLanguage()
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $this->language_id = Language::where('slug', '=', $cur_lang)->FirstOrFail();
        $this->language_id = $this->language_id->id;
        $this->save();
    }

    public function setUserLanguage($id)
    {
        if ($id === null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }

    public static function setSlugLanguage($id)
    {
        $slugLang = Language::find($id);
        return $slugLang->slug;
    }

    public function remove()
    {
        $this->delete();
    }

}
