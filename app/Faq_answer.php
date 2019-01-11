<?php

namespace App;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsTo\Languages_id;
use App\Traits\Relations\HasOne\FAQuestion;
use App\Traits\Relations\HasOne\Users;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Faq_answer
 *
 * @property int $id
 * @property mixed|null $answer
 * @property int $faq_question_id
 * @property int $user_id
 * @property int $language_id
 * @property int $views
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereFaqQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Faq_answer whereViews($value)
 * @mixin \Eloquent
 * @property-read \App\Faq_question $faq_question
 * @property-read \App\Language $language
 * @property-read \App\User $user
 */
class Faq_answer extends Model
{
    use FAQuestion, PrepareLangStrForJsonMethods, Users, Languages_id;

    protected $fillable = [
        'answer',
        'faq_question_id',
        'user_id',
        'language_id',
        'views'
    ];

    public function getQuestion():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return ($this->faq_question_id !== null)
            ? json_decode($this->faq_question->question)->$locale
            : '';
    }

    public function getUserName():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        if ($this->user->language->first()->slug === $locale) {
            return ($this->user_id !== null)
                ? $this->user->first_name . ' ' . $this->user->last_name
                : '';
        }

        return ($this->user_id !== null)
            ? $this->user->first_name_en . ' ' . $this->user->last_name_en
            : '';
    }

    public function getOriginLang() :string
    {
        return ($this->language_id !== null)
            ? $this->language->slug
            : '';
    }

    public function addAnswer($request):void
    {
        $answer = new static;
        $answer->fill($request->all());
        $answer->sort = $request->sort ?? self::max('sort') + 1;
        $answer->answer = json_encode($answer->createLangString($request, 'answer'));
        $answer->save();
    }

    public function editAnswer($request, $id):void
    {
        $answer = self::find($id);
        $answer->fill($request->all());
        $answer->sort = $request->sort ?? self::max('sort') + 1;
        $answer->answer = json_encode($answer->createLangString($request, 'answer'));
        $answer->update($request->all());
    }

    public function removeAnswer($id):void
    {
        self::find($id)->delete();
    }
}
