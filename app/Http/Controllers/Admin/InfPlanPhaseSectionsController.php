<?php

namespace App\Http\Controllers\Admin;

use App\Inf_plan_phase_section;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfPlanPhaseSectionsController extends Controller
{
    public function index()
    {
        $plan_phase_sections = Inf_plan_phase_section::all();
        return view('admin.inf_plan_phase_sections.index',compact('plan_phase_sections'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_plan_phase_sections.create', compact('language'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_title' => 'required',
            'language_id' => 'required'
        ]);
        $plan_phase_sections = Inf_plan_phase_section::create($request->all());
        $plan_phase_sections->setLanguage($request->get('language_id'));

        return redirect()->route('inf_plan_phase_sections.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $plan_phase_section = Inf_plan_phase_section::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_plan_phase_sections.edit', compact('plan_phase_section', 'language'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sub_title' => 'required',
            'language_id' => 'required'
        ]);
        $plan_phase_section = Inf_plan_phase_section::find($id);
        $plan_phase_section->setLanguage($request->get('language_id'));
        $plan_phase_section->update($request->all());

        return redirect()->route('inf_plan_phase_sections.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_plan_phase_section::find($id)->delete();
        return redirect()->route('inf_plan_phase_sections.index');
    }
}
