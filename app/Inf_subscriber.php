<?php

namespace App;

use App;
use App\Mail\Information\VerifySubscriberMail;
use App\Traits\Relations\HasOne\Languages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lang;
use Mail;
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
    use Languages;

    protected $fillable = [
        'email', 'language_id'
    ];
    protected $hidden = [
        'token'
    ];

    public static function addSubscriber($fields) :void
    {
        $subscriber = new static;
        $subscriber->fill($fields->all());
        $subscriber->setUserLanguage($fields->get('language_id'));
        $subscriber->save();

        if($fields->get('token') !== null){
            $subscriber->generateToken();
            App::setLocale(self::setSlugLanguage($fields->get('language_id')));

            Mail::to($subscriber)->send(new VerifySubscriberMail($subscriber));
//            Mail::to($subscriber)->queue(new VerifySubscriberMail($subscriber));
        }
    }

    public function getName()
    {
        if ($this->email !== null){
            $name = User::whereEmail($this->email)->first();
            if ($name !== null){
                $locale = LaravelLocalization::getCurrentLocale();
                if ($name->language->first()->slug === $locale){
                    return $name->first_name .' '. $name->last_name;
                }
                return $name->first_name_en .' '. $name->last_name_en;
            }
            return Lang::get('admin.anonymous');
        }

        return redirect()->back()->with('status', Lang::get('status.mail_not_specified'));
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

    public function setLanguage(): void
    {
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $this->language_id = Language::where('slug', '=', $cur_lang)
            ->first()->id;
        $this->save();
    }

    public function setUserLanguage($id): void
    {
        if ($id === null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }

    public static function setSlugLanguage($id)
    {
        return Language::find($id)->slug;
    }

    public function removeSubscriber($id): void
    {
        $subscriber = self::find($id);
        $subscriber->delete();
    }

}
