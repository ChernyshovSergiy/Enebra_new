<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InfVideos\ValidateRequest;
use App\Image;
use App\Inf_video;
use App\Inf_video_group;
use App\Inf_video_group_section;
use App\Http\Controllers\Controller;

class InfVideosController extends Controller
{
    public function index()
    {
        $videos = Inf_video::all();
        return view('admin.inf_videos.index',compact('videos'));
    }

    public function create()
    {
        $video_group = Inf_video_group::pluck('title', 'id')->all();
        $video_group_section = Inf_video_group_section::pluck('title', 'id')->all();
        $image = Image::pluck('title', 'id')->all();

        return view('admin.inf_videos.create', compact('video_group', 'video_group_section', 'image'));
    }

    public function store(ValidateRequest $request)
    {
        $video_group_sections = Inf_video::create($request->all());
        $video_group_sections->setVideoGroup($request->get('video_group_id'));
        $video_group_sections->setVideoGroupSection($request->get('video_group_section_id'));
        $video_group_sections->setImage($request->get('image_id'));
        $video_group_sections->setLanguage();

        return redirect()->route('inf_videos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video = Inf_video::find($id);
        $video_group = Inf_video_group::pluck('title', 'id')->all();
        $video_group_section = Inf_video_group_section::pluck('title', 'id')->all();
        $image = Image::pluck('title', 'id')->all();

        return view('admin.inf_videos.edit', compact('video','video_group_section', 'video_group', 'image'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $video = Inf_video::find($id);
        $video->setVideoGroup($request->get('video_group_id'));
        $video->setVideoGroupSection($request->get('video_group_section_id'));
        $video->setImage($request->get('image_id'));
        $video->setLanguage();
        $video->update($request->all());

        return redirect()->route('inf_videos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_video::find($id)->delete();
        return redirect()->route('inf_videos.index');
    }
}
