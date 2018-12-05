<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VideoCollections\CreateRequest;
use App\Inf_video_group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoCollectionsController extends Controller
{
    public function index()
    {
        $inf_video_groups = Inf_video_group::all();
        return view('admin.video_collections.index',['inf_video_groups' => $inf_video_groups]);
    }

    public function create()
    {
        return view('admin.video_collections.create');
    }

    public function store(CreateRequest $request)
    {
        Inf_video_group::create($request->all());
        return redirect()->route('video_collections.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $inf_video_group = Inf_video_group::find($id);
        return view('admin.video_collections.edit',['inf_video_group' => $inf_video_group]);
    }

    public function update(CreateRequest $request, $id)
    {
        $inf_video_group = Inf_video_group::find($id);
        $inf_video_group->update($request->all());
        return redirect()->route('video_collections.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_video_group::find($id)->delete();
        return redirect()->route('video_collections.index');
    }
}
