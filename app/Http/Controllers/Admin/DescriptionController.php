<?php

namespace App\Http\Controllers\Admin;

use App\Desc_block;
use App\Description;
use App\Http\Requests\Admin\Description\ValidateRequest;
use App\Services\ImagesService;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DescriptionController extends Controller
{
    public $model;
    public $DescBlocksModel;
    public $json;
    public $languages;
    public $images;

    public function __construct(
        Description $description_blocks,
        Desc_block $desc_block,
        JsonService $jsonService,
        LanguagesService $languagesService,
        ImagesService $imagesService
    )
    {
        $this->model = $description_blocks;
        $this->DescBlocksModel = $desc_block;
        $this->json = $jsonService;
        $this->languages = $languagesService;
        $this->images = $imagesService;
    }
    public function index()
    {
        $descriptions = $this->json->build($this->model, 'content');
        $locale = LaravelLocalization::getCurrentLocale();
        return view('admin.descriptions.index',
            compact('descriptions', 'locale'));
    }

    public function create()
    {
        $desc_blocks = $this->DescBlocksModel->getDescBlockNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $languages = $this->languages->getActiveLanguages();
        $images = $this->images->getImageNameByCategory(5);

        return view('admin.descriptions.create',
            compact(
                'desc_blocks',
                'text_blocks',
                'languages',
                'images'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addNewTextBlock($request);

        return redirect()->route('descriptions.index');
    }

    public function edit($id)
    {
        $description = $this->json->build($this->model, 'content')->find($id);
        $desc_blocks = $this->DescBlocksModel->getDescBlockNames();
        $text_blocks = $this->model->getTextColumnsForTranslate();
        $languages = $this->languages->getActiveLanguages();
        $images = $this->images->getImageNameByCategory(5);

        return view('admin.descriptions.edit',
            compact(
                'description',
                'desc_blocks',
                'desc_blocks',
                'text_blocks',
                'languages',
                'images'
            ));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editTextBlock($request, $id);

        return redirect()->route('descriptions.index');
    }

    public function destroy($id)
    {
        $this->model->removeTextBlock($id);

        return redirect()->route('descriptions.index');
    }
}
