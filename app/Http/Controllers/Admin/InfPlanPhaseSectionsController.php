<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPlanPhaseSections\ValidateRequest;
use App\Models\Inf_plan_phase_section;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPlanPhaseSectionsController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(
        Inf_plan_phase_section $inf_plan_phase_section,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $inf_plan_phase_section;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $plan_phase_sections = $this->json->build($this->model, 'sub_title');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_plan_phase_sections.index',
            compact('plan_phase_sections', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_plan_phase_sections.create', compact('languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->createNewPhaseSection($request);

        return redirect()->route('inf_plan_phase_sections.index');
    }

    public function edit($id)
    {
        $plan_phase_section = $this->json->build($this->model, 'sub_title')->find($id);
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_plan_phase_sections.edit',
            compact('plan_phase_section', 'languages'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editPhaseSection($request, $id);

        return redirect()->route('inf_plan_phase_sections.index');
    }

    public function destroy($id)
    {
        $this->model->removePhaseSection($id);

        return redirect()->route('inf_plan_phase_sections.index');
    }
}
