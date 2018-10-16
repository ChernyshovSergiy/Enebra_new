<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    public function index()
    {
        $inf_menu_points = Menu::all();
        return view('admin.menus.index', compact('inf_menu_points'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.menus.create', compact('language'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'is_active' => 'nullable',
            'url' => 'nullable',
            'parent' => 'required',
            'sort' => 'required',
            'language_id' => 'required'
        ]);
        $menu = Menu::create($request->all());
        $menu->setLanguage($request->get('language_id'));


        return redirect()->route('inf_menus.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $inf_menu_point = Menu::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.menus.edit', compact('inf_menu_point','language'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'is_active' => 'nullable',
            'url' => 'required',
            'parent' => 'required',
            'sort' => 'required',
            'language_id' => 'required'
        ]);
        $inf_menu_point = Menu::find($id);
        $inf_menu_point ->setLanguage($request->get('language_id'));
        $inf_menu_point->update($request->all());

        return redirect()->route('inf_menus.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect()->route('inf_menus.index');
    }

    public function toggle($id)
    {
        $point = Menu::find($id);
        $point->toggleActive();

        return redirect()->back();
    }
}
