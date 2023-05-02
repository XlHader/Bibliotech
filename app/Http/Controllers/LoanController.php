<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Resources\LoanCollection;
use App\Models\Loan;
use App\Services\LoanService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use InvalidArgumentException;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LoanCollection(Loan::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        try {
            $data = $request->validated();

            $clientId = $data['client_id'];
            $booksIds = $data['books_ids'];

            $avaibleBooksIds = LoanService::getAvaibleBooks($booksIds);
            LoanService::validateAvailableBooks($avaibleBooksIds);

            $loans = LoanService::createLoansArray($clientId, $avaibleBooksIds);
            LoanService::saveLoansAndMarkBooksAsUnavailable($loans, $avaibleBooksIds);

            return jsonResponse(count($avaibleBooksIds) > 1 ? 'El préstamo de los libros ' : 'El préstamo del libro ' . LoanService::getBooksTitles($avaibleBooksIds) . ' se ha realizado correctamente.', null, 201);
        } catch (InvalidArgumentException $e) {
            return validationErrorResponse(['loan' => [$e->getMessage()]], getStatusResponse($e->getCode()));
        } catch (\Throwable $th) {
            return validationErrorResponse(['loan' => [$th->getMessage()]], getStatusResponse($e->getCode()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $loanId)
    {
        try {
            $loan = Loan::with('client', 'book')->findOrFail($loanId);

            return jsonResponse('Préstamo obtenido correctamente.', $loan);
        } catch (\Exception $e) {
            return validationErrorResponse(['loan' => ['No hay resultados de préstamos para el id ingresado.']], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $loanId)
    {
        try {
            $loan = Loan::findOrFail($loanId);

            $loan->update($request->all());

            return jsonResponse('Préstamo actualizado correctamente.', $loan);
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['loan' => [$e->getMessage()]], getStatusResponse($e->getCode()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $loanId)
    {
        try {
            $loan = Loan::findOrFail($loanId);

            $loan->delete();

            return jsonResponse('Préstamo eliminado correctamente.');
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['loan' => [$e->getMessage()]], getStatusResponse($e->getCode()));
        }
    }
}