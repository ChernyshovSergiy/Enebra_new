<?php

namespace App\Http\Controllers\Admin;

use App\Inf_video_group;
use App\Inf_video_group_section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfVideoGroupSectionsController extends Controller
{
    public function index()
    {
        $video_group_sections = Inf_video_group_section::all();
        return view('admin.inf_video_group_sections.index',compact('video_group_sections'));
    }

    public function create()
    {
        $video_group = Inf_video_group::pluck('title', 'id')->all();

        return view('admin.inf_video_group_sections.create', compact('video_group'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'video_group_id' => 'required'
        ]);
        $video_group_sections = Inf_video_group_section::create($request->all());
        $video_group_sections->setVideoGroup($request->get('video_group_id'));
        $video_group_sections->setLanguage();

        return redirect()->route('inf_video_group_sections.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video_group_section = Inf_video_group_section::find($id);
        $video_group = Inf_video_group::pluck('title', 'id')->all();

        return view('admin.inf_video_group_sections.edit', compact('video_group_section', 'video_group'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'video_group_id' => 'required'
        ]);
        $video_group_section = Inf_video_group_section::find($id);
        $video_group_section->setVideoGroup($request->get('video_group_id'));
        $video_group_section->setLanguage();
        $video_group_section->update($request->all());

        return redirect()->route('inf_video_group_sections.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_video_group_section::find($id)->delete();
        return redirect()->route('inf_video_group_sections.index');
    }
}
