<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfPlanPhaseSectionPoint\ValidateRequest;
use App\Inf_plan_phase;
use App\Inf_plan_phase_section;
use App\Inf_plan_section_point;
use App\Language;
use App\Http\Controllers\Controller;

class InfPlanPhaseSectionPointsController extends Controller
{
    public function index()
    {
        $plan_phase_section_points = Inf_plan_section_point::all();
        return view('admin.inf_plan_phase_section_points.index',compact('plan_phase_section_points'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();
        $phase = Inf_plan_phase::pluck('title', 'id')->all();
        $section = Inf_plan_phase_section::pluck('sub_title', 'id')->all();

        return view('admin.inf_plan_phase_section_points.create', compact('language', 'phase', 'section'));
    }

    public function store(ValidateRequest $request)
    {
        $plan_phase_section_points = Inf_plan_section_point::create($request->all());
        $plan_phase_section_points->setPhase($request->get('language_id'));
        $plan_phase_section_points->setSection($request->get('phase_id'));
        $plan_phase_section_points->setLanguage($request->get('section_id'));
        $plan_phase_section_points->toggleDone($request->get('is_done'));

        return redirect()->route('inf_plan_phase_section_points.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $plan_phase_section_point = Inf_plan_section_point::find($id);
        $phase = Inf_plan_phase::pluck('title', 'id')->all();
        $section = Inf_plan_phase_section::pluck('sub_title', 'id')->all();
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_plan_phase_section_points.edit', compact('plan_phase_section_point', 'phase', 'section', 'language'));
    }

    public function update(ValidateRequest $request, $id)
    {

        $plan_phase_section_point = Inf_plan_section_point::find($id);
        $plan_phase_section_point->setPhase($request->get('phase_id'));
        $plan_phase_section_point->setSection($request->get('section_id'));
        $plan_phase_section_point->setLanguage($request->get('language_id'));
        $plan_phase_section_point->toggleDone($request->get('is_done'));
        $plan_phase_section_point->update($request->all());

        return redirect()->route('inf_plan_phase_section_points.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_plan_section_point::find($id)->delete();
        return redirect()->route('inf_plan_phase_section_points.index');
    }
}
