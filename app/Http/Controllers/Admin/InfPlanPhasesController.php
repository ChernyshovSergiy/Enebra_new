<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPlanPhases\ValidateRequest;
use App\Inf_plan_phase;
use App\Language;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfPlanPhasesController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(
        Inf_plan_phase $inf_plan_phase,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $inf_plan_phase;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $plan_phases = $this->json->build($this->model, 'title');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.inf_plan_phases.index',compact(
            'plan_phases', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_plan_phases.create', compact('languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->createPlanPhase($request);

        return redirect()->route('inf_plan_phases.index');
    }

    public function edit($id)
    {
        $plan_phase = $this->json->build($this->model, 'title')->find($id);
        $languages = $this->languages->getActiveLanguages();

        return view('admin.inf_plan_phases.edit', compact(
            'plan_phase', 'languages'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $plan_phase = Inf_plan_phase::find($id);
        $plan_phase->editPlanPhase($request, $plan_phase);

        return redirect()->route('inf_plan_phases.index');
    }

    public function destroy($id)
    {
        Inf_plan_phase::find($id)->removePlanPhase();
        return redirect()->route('inf_plan_phases.index');
    }
}
