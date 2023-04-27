<?php

namespace App\Http\Controllers;

use App\Http\Resources\RefundCollection;
use App\Models\Refund;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Services\RefundService;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RefundCollection(Refund::with('loan')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $loanId, Request $request)
    {
        try {
            $loan = RefundService::getLoan($loanId);

            $refundData = [
                'loan_id' => $loanId,
                'refund_date' => now()->add(20, 'days') // Simulando que se entrego después de 20 días. Normalmente solo iría Now()
            ];

            $loanReturnDateLimit = new Carbon($loan['return_date_limit']);

            if (RefundService::validateLoanReturnDateLimit($loanReturnDateLimit)) {
                $daysOfDelay = RefundService::getDaysOfDelay($loanReturnDateLimit);
                $penalty = RefundService::getPenalty($daysOfDelay);
                $refundData['days_of_delay'] = $daysOfDelay;
                $refundData['penalty'] = $penalty;
            }

            $refund = RefundService::createRefund($refundData);

            $message = RefundService::getRefundMessage($loan['book']['title'], $daysOfDelay ?? 0, $penalty ?? 0);

            return jsonResponse($message, $refund);
        } catch (ModelNotFoundException | ValidationException $e) {
            return validationErrorResponse(['loan refund' => $e->getMessage()], getStatusResponse($e->getCode()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $refundId)
    {
        try {
            $refund = Refund::with('loan')->findOrFail($refundId);
            return jsonResponse('Devolución encontrada', $refund);
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['refund' => 'No se ha encontrado una devolución con el ID ingresado.'], getStatusResponse($e->getCode()));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $refundId)
    {
        try {
            $refund = Refund::findOrFail($refundId);
            $refund->update($request->all());
            return jsonResponse('Devolución actualizada correctamente.', $refund);
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['refund' => $e->getMessage()], getStatusResponse($e->getCode()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $refundId)
    {
        try {
            $refund = Refund::findOrFail($refundId);
            $refund->delete();
            return jsonResponse('Devolución eliminada correctamente.', $refund);
        } catch (ModelNotFoundException $e) {
            return validationErrorResponse(['refund' => $e->getMessage()], getStatusResponse($e->getCode()));
        }
    }
}