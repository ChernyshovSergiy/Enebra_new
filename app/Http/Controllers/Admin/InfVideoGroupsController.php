<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfVideoGroup\ValidateRequest;
use App\Inf_video_group;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfVideoGroupsController extends Controller
{
    public function index()
    {
        $video_groups = Inf_video_group::all();
        return view('admin.inf_video_groups.index',compact('video_groups'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_video_groups.create', compact('language'));
    }

    public function store(ValidateRequest $request)
    {
        $video_groups = Inf_video_group::create($request->all());
        $video_groups->setLanguage($request->get('language_id'));

        return redirect()->route('inf_video_groups.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video_group = Inf_video_group::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.inf_video_groups.edit', compact('video_group', 'language'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $video_group = Inf_video_group::find($id);
        $video_group->setLanguage($request->get('language_id'));
        $video_group->update($request->all());

        return redirect()->route('inf_video_groups.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_video_group::find($id)->delete();
        return redirect()->route('inf_video_groups.index');
    }
}
