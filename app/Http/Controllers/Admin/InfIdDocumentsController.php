<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\IdDocument\ValidateRequest;
use App\Inf_id_document;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InfIdDocumentsController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(Inf_id_document $id_document, JsonService $jsonService, LanguagesService $languagesService)
    {
        $this->model = $id_document;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }

    public function index()
    {
        $id_documents = $this->json->build($this->model, 'name');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.id_documents.index', compact('id_documents', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();

        return view('admin.id_documents.create', compact('languages'));
    }

    public function store(ValidateRequest $request)
    {
        $model = $this->json->createLangString($request, 'name', $this->model);
        $model->save();

        return redirect()->route('id_documents.index');
    }

    public function edit($id)
    {
        $id_document = $this->json->build($this->model, 'name')->find($id);
        $languages = $this->languages->getActiveLanguages();

        return view('admin.id_documents.edit', compact('id_document','languages'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $model = Inf_id_document::find($id);
        $model->editDoc($request, $model);

        return redirect()->route('id_documents.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Inf_id_document::find($id)->delete();
        return redirect()->route('id_documents.index');
    }
}
