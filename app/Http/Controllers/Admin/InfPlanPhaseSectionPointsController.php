<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPlanPhaseSectionPoint\ValidateRequest;
use App\Inf_plan_phase;
use App\Inf_plan_phase_section;
use App\Inf_plan_section_point;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPlanPhaseSectionPointsController extends Controller
{
    public $model;
    public $phases;
    public $sections;
    public $languages;
    public $json;

    public function __construct(
        Inf_plan_section_point $inf_plan_section_point,
        Inf_plan_phase $inf_plan_phase,
        Inf_plan_phase_section $inf_plan_phase_section,
        LanguagesService $languagesService,
        JsonService $jsonService)
    {
        $this->model = $inf_plan_section_point;
        $this->phases = $inf_plan_phase;
        $this->sections = $inf_plan_phase_section;
        $this->languages = $languagesService;
        $this->json = $jsonService;
    }
    public function index()
    {
        $plan_phase_section_points = $this->json->build($this->model ,'entry');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.inf_plan_phase_section_points.index',
            compact('plan_phase_section_points', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $phase = $this->phases->getPhaseNames();
        $section = $this->sections->getSectionNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.inf_plan_phase_section_points.create',
            compact('languages', 'phase', 'section', 'text_blocks'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addPlanPoint($request);

        return redirect()->route('inf_plan_phase_section_points.index');
    }

    public function edit($id)
    {
        $plan_phase_section_point = $this->json->build($this->model ,'entry')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $phase = $this->phases->getPhaseNames();
        $section = $this->sections->getSectionNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.inf_plan_phase_section_points.edit',
            compact('plan_phase_section_point', 'phase', 'section', 'languages', 'text_blocks'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editPlanPoint($request, $id);

        return redirect()->route('inf_plan_phase_section_points.index');
    }

    public function destroy($id)
    {
        $this->model->removePlanPoint($id);

        return redirect()->route('inf_plan_phase_section_points.index');
    }

    public function toggle($id)
    {
        $this->model->toggleDone($id);

        return redirect()->back();
    }
}
