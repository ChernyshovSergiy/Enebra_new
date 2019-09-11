<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq_answer;
use App\Models\Faq_question;
use App\Http\Requests\Admin\FaqAnswers\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Models\User;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FaqAnswerController extends Controller
{
    public $model;
    public $questionModel;
    public $json;
    public $pageName;
    public $userNames;
    public $languages;

    public function __construct(
        Faq_answer $faq_answer,
        Faq_question $faq_question,
        JsonService $jsonService,
        PagesService $page,
        User $users,
        LanguagesService $languagesService
    )
    {
        $this->model = $faq_answer;
        $this->questionModel = $faq_question;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->userNames = $users;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $answers = $this->json->build($this->model, 'answer');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.faq_answers.index',
            compact('answers', 'locale'));
    }

    public function create()
    {
        $questions = $this->questionModel->getQuestions();
        $user_names = $this->userNames->getUserNames();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.faq_answers.create',
            compact('questions', 'user_names', 'languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addAnswer($request);

        return redirect()->route('faq_answers.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $answer = $this->json->build($this->model, 'answer')->find($id);
        $questions = $this->questionModel->getQuestions();
        $user_names = $this->userNames->getUserNames();

        return view('admin.faq_answers.edit',
            compact('answer','questions', 'languages', 'user_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editAnswer($request, $id);

        return redirect()->route('faq_answers.index');
    }

    public function destroy($id)
    {
        $this->model->removeAnswer($id);

        return redirect()->route('faq_answers.index');
    }
}
