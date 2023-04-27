<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentTypeRequest;
use App\Models\DocumentType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentTypeController extends Controller
{
    public function index()
    {
        return DocumentType::all();
    }

    public function store(StoreDocumentTypeRequest $request) {
        try {
            $data = $request->validated();
            $documentType = DocumentType::create($data);
            return jsonResponse('El documento se ha creado correctamente', $documentType, 201);
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['DocumentType' => [$e->getMessage()]], $e->getCode());
        }
    }
}
