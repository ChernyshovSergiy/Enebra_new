<?php

namespace App\Http\Controllers\Admin;

use App\Inf_plan_phase;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfPlanPhasesController extends Controller
{
    public function index()
    {
        $plan_phases = Inf_plan_phase::all();
        return view('admin.inf_plan_phases.index',compact('plan_phases'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_plan_phases.create', compact('language'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'language_id' => 'required'
        ]);
        $plan_phases = Inf_plan_phase::create($request->all());
        $plan_phases->setLanguage($request->get('language_id'));

        return redirect()->route('inf_plan_phases.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $plan_phase = Inf_plan_phase::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_plan_phases.edit', compact('plan_phase', 'language'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'language_id' => 'required'
        ]);
        $plan_phase = Inf_plan_phase::find($id);
        $plan_phase->setLanguage($request->get('language_id'));
        $plan_phase->update($request->all());

        return redirect()->route('inf_plan_phases.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_plan_phase::find($id)->delete();
        return redirect()->route('inf_plan_phases.index');
    }
}
