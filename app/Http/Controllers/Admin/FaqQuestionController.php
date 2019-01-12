<?php

namespace App\Http\Controllers\Admin;

use App\Faq_question;
use App\Http\Requests\Admin\FaqQuestions\ValidateRequest;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Http\Controllers\Controller;
use App\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FaqQuestionController extends Controller
{
    public $model;
    public $json;
    public $pageName;
    public $userNames;
    public $languages;

    public function __construct(
        Faq_question $faq_question,
        JsonService $jsonService,
        PagesService $page,
        User $users,
        LanguagesService $languagesService
    )
    {
        $this->model = $faq_question;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->userNames = $users;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $questions = $this->json->build($this->model, 'question');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.faq_questions.index',
            compact('questions', 'locale'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();
        $user_names = $this->userNames->getUserNames();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.faq_questions.create',
            compact('page_names', 'user_names', 'languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addQuestion($request);

        return redirect()->route('faq_questions.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $question = $this->json->build($this->model, 'question')->find($id);
        $page_names = $this->pageName->getActivePagesName();
        $user_names = $this->userNames->getUserNames();

        return view('admin.faq_questions.edit',
            compact('question','languages','page_names', 'user_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editQuestion($request, $id);

        return redirect()->route('faq_questions.index');
    }

    public function destroy($id)
    {
        $this->model->removeQuestion($id);

        return redirect()->route('faq_questions.index');
    }
}
