<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Menus\ValidateRequest;
use App\Menu;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenusController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(
        Menu $menu,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $menu;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $inf_menu_points = $this->json->build($this->model, 'title');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.menus.index', compact('inf_menu_points', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $page_names = Menu::getMenuPointName();

        return view('admin.menus.create', compact('page_names', 'languages'));
    }

    public function store(ValidateRequest $request)
    {
        Menu::addMenuPoint($request);

        return redirect()->route('inf_menus.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $inf_menu_point = $this->json->build($this->model, 'title')->find($id);
        $page_names = Menu::getMenuPointName();

        return view('admin.menus.edit', compact(
            'inf_menu_point',
            'page_names', 'languages'));
    }

    public function update(ValidateRequest $request, $id)
    {
        Menu::editMenuPoint($request, $id);

        return redirect()->route('inf_menus.index');
    }

    public function destroy($id)
    {
        Menu::removeMenuPoint($id);

        return redirect()->route('inf_menus.index');
    }

    public function toggle($id)
    {
        Menu::find($id)->toggleActive();

        return redirect()->back();
    }
}
