<?php

namespace App\Http\Controllers\Admin;

use App\Desc_block;
use App\Http\Requests\Admin\DescBlocks\ValidateRequest;
use App\Services\PagesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescBlockController extends Controller
{

    public $model;
    public $pageName;

    public function __construct(
        Desc_block $desc_blocks,
        PagesService $page
    )
    {
        $this->model = $desc_blocks;
        $this->pageName = $page;
    }
    public function index()
    {
        $blocks = $this->model::all();

        return view('admin.desc_blocks.index', compact('blocks'));
    }

    public function create()
    {
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.desc_blocks.create', compact('page_names'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addDescBlock($request);

        return redirect()->route('desc_blocks.index');
    }

    public function edit($id)
    {
        $block = $this->model::find($id);
        $page_names = $this->pageName->getActivePagesName();

        return view('admin.desc_blocks.edit',
            compact('block','page_names'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editDescBlock($request, $id);

        return redirect()->route('desc_blocks.index');
    }

    public function destroy($id)
    {
        $this->model->removeDescBlock($id);

        return redirect()->route('descriptions.index');
    }
}
