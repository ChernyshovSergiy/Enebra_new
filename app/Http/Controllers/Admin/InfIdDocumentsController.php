<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\IdDocument\ValidateRequest;
use App\Inf_id_document;
use App\Language;
use App\Http\Controllers\Controller;

class InfIdDocumentsController extends Controller
{
    public function index()
    {
        $id_documents = Inf_id_document::all();

        return view('admin.id_documents.index', compact('id_documents'));
    }

    public function create()
    {
        $language = Language::pluck('title', 'id')->all();

        return view('admin.id_documents.create', compact('language'));
    }

    public function store(ValidateRequest $request)
    {
        $id_documents = Inf_id_document::create($request->all());
        $id_documents->setLanguage($request->get('language_id'));

        return redirect()->route('id_documents.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id_document = Inf_id_document::find($id);
        $language = Language::pluck('title', 'id')->all();

        return view('admin.id_documents.edit', compact('id_document','language'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $id_document = Inf_id_document::find($id);
        $id_document ->setLanguage($request->get('language_id'));
        $id_document->update($request->all());

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
