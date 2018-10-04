<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfIntroduction\ValidateRequest;
use App\Inf_introduction;
use App\Language;
use App\Http\Controllers\Controller;

class InfIntroductionsController extends Controller
{
    public function index()
    {
        $introductions = Inf_introduction::all();

        return view('admin.inf_introductions.index', compact('introductions'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_introductions.create', compact('language'));
    }

    public function store(ValidateRequest $request)
    {
        $introductions = Inf_introduction::create($request->all());
        $introductions->setLanguage($request->get('language_id'));

        return redirect()->route('introductions.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $introduction = Inf_introduction::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_introductions.edit', compact('introduction','language'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $introductions = Inf_introduction::find($id);
        $introductions ->setLanguage($request->get('language_id'));
        $introductions->update($request->all());

        return redirect()->route('introductions.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_introduction::find($id)->delete();
        return redirect()->route('introductions.index');
    }
}
