<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfIntroductionPoints\ValidateRequest;
use App\Inf_introduction_point;
use App\Language;
use App\Http\Controllers\Controller;

class InfIntroductionPointsController extends Controller
{
    public function index()
    {
        $inf_intr_points = Inf_introduction_point::all();

        return view('admin.inf_int_points.index', compact('inf_intr_points'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_int_points.create', compact('language'));
    }

    public function store(ValidateRequest $request)
    {
//        dd($request->all());
        $inf_intr_points = Inf_introduction_point::create($request->all());
        $inf_intr_points->setLanguage($request->get('language_id'));

        return redirect()->route('introduction_points.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $inf_intr_point = Inf_introduction_point::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_int_points.edit', compact('inf_intr_point','language'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $inf_intr_points = Inf_introduction_point::find($id);
        $inf_intr_points ->setLanguage($request->get('language_id'));
        $inf_intr_points->update($request->all());

        return redirect()->route('introduction_points.index');
    }

    public function destroy($id)
    {
        Inf_introduction_point::find($id)->delete();
        return redirect()->route('introduction_points.index');
    }
}
