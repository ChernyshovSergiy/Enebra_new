<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasMany\FAQAnswers;
use App\Traits\Relations\HasOne\MenuId;
use App\Traits\Relations\HasOne\Users;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Faq_question
 *
 * @property int $id
 * @property mixed|null $question
 * @property int $menu_id
 * @property int $user_id
 * @property int|null $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq_answer[] $faq_answers
 * @property-read \App\Models\Menu $menu
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faq_question whereUserId($value)
 * @mixin \Eloquent
 */
class Faq_question extends Model
{
    use MenuId, PrepareLangStrForJsonMethods, Users, FAQAnswers;


    protected $fillable = [
        'question',
        'menu_id',
        'user_id'
    ];

    public function getPageTitle():string
    {
        $locale = LaravelLocalization::getCurrentLocale();

        return ($this->menu_id !== null)
            ? json_decode( $this->menu->title )->$locale
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

    public function getQuestions() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $questions = self::pluck( 'question', 'id')->all();
        $question_texts = [];
        foreach($questions as $key => $question){
            $question_texts[$key] = substr(json_decode($question)->$locale, 3,-4);
        }
        return $question_texts;
    }

    public function addQuestion($request):void
    {
        $question = new static;
        $question->fill($request->all());
        $question->sort = $request->sort ?? self::max('sort') + 1;
        $question->question = json_encode($question->createLangString($request, 'question'));
        $question->save();
    }

    public function editQuestion($request, $id):void
    {
        $question = self::find($id);
        $question->sort = $request->sort ?? self::max('sort') + 1;
        $question->fill($request->all());
        $question->question = json_encode($question->createLangString($request, 'question'));
        $question->update($request->all());
    }

    public function removeQuestion($id):void
    {
        self::find($id)->delete();
    }
}
