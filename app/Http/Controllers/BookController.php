<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_is_admin = auth()->user()->admin;
        return new BookCollection(
            $user_is_admin
            ? Book::with('loans')->get()
            : Book::where('is_avaible', true)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
        return jsonResponse('El libro se ha creado correctamente.', $book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $bookId)
    {
        try {
            $book = Book::findOrFail($bookId);
            return jsonResponse('El libro se ha obtenido correctamente.', $book);
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El libro que desea obtener no existe.', null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, int $bookId)
    {
        try {
            $book = Book::findOrFail($bookId);
            $data = $request->validated();
            $book->update($data);
            return jsonResponse('El estado del libro se ha actualizado correctamente.', $book);
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El libro que desea actualizar no existe.', null, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $bookId)
    {
        try {
            $book = Book::findOrFail($bookId);
            $book->delete();
            return jsonResponse('El libro se ha eliminado correctamente.');
        } catch (ModelNotFoundException $exception) {
            return jsonResponse('El libro que desea eliminar no existe.', null, 404);
        }
    }
}