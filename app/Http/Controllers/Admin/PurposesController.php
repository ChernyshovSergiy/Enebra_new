<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Propose\ValidateRequest;
use App\Models\Purpose;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Services\PagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PurposesController extends Controller
{
    public $model;
    public $json;
    public $pageName;
    public $languages;

    public function __construct(
        Purpose $introduction_point,
        JsonService $jsonService,
        PagesService $page,
        LanguagesService $languagesService
    )
    {
        $this->model = $introduction_point;
        $this->json = $jsonService;
        $this->pageName = $page;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $purposes = $this->json->build($this->model, 'goal');

        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.purposes.index',
            compact('purposes', 'locale'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();
        $languages = $this->languages->getActiveLanguages();

        return view('admin.purposes.create',
            compact('page_names','languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addGoal($request);

        return redirect()->route('purposes.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $purpose = $this->json->build($this->model, 'goal')->find($id);
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.purposes.edit',
            compact('purpose','languages','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editGoal($request, $id);

        return redirect()->route('purposes.index');
    }

    public function destroy($id)
    {
        $this->model->removeGoal($id);

        return redirect()->route('purposes.index');
    }
}
