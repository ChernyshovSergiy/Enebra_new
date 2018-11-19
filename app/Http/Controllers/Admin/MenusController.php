<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Menus\ValidateRequest;
use App\Menu;
use App\Http\Controllers\Controller;
use Lang;

class MenusController extends Controller
{
    public function index()
    {
        $inf_menu_points = Menu::all();
        return view('admin.menus.index', compact('inf_menu_points'));
    }

    public function create()
    {
        $page_names = Menu::getMenuPointName();

        return view('admin.menus.create', compact('page_names'));
    }

    public function store(ValidateRequest $request)
    {
        Menu::create($request->all());

        return redirect()->route('inf_menus.index');
    }

    public function edit($id)
    {
        $inf_menu_point = Menu::find($id);
        $page_names = Menu::getMenuPointName();

//        $var = Lang::get('nav.root',[],'ru');
//        dd($var);

        return view('admin.menus.edit', compact('inf_menu_point', 'page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $inf_menu_point = Menu::find($id);
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
