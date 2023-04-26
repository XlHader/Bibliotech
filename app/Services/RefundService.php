<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\Refund;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RefundService
{
    public static function getPenalty(int $daysOfDelay): int
    {
        return $daysOfDelay * 500;
    }

    public static function validateLoanReturnDateLimit(Carbon $loanReturnDateLimit): bool
    {
        return $loanReturnDateLimit->isPast();
    }

    public static function getDaysOfDelay(Carbon $loanReturnDateLimit): int
    {
        return $loanReturnDateLimit->diffInDays(now());
    }

    public static function getRefundMessage(string $bookTitle, int $daysOfDelay, int $penalty): string
    {
        return "Devolución registrada correctamente para el libro $bookTitle "
            . ($daysOfDelay > 0 ? "con $daysOfDelay días de retraso y una penalización de $" . $penalty : '');
    }

    public static function getLoan(int $loanId)
    {
        $loan = Loan::with('book')
            ->whereDoesntHave('refunds')
            ->find($loanId)
                ?->toArray();

        if (!$loan) {
            throw new ValidationException('El préstamo ya ha sido devuelto', 422);
        }

        return $loan;

    }

    public static function createRefund(int $loanId, Carbon $refundDate)
    {
        try {
            return Refund::create([
                'loan_id' => $loanId,
                'refund_date' => $refundDate
            ]);
        } catch (\Throwable $th) {
            throw new ValidationException('No se pudo registrar la devolución', 422);
        }

    }

    public static function updateRefund(Refund $refund, int $daysOfDelay, int $penalty)
    {
        try {
            $refund->update([
                'days_of_delay' => $daysOfDelay,
                'penalty' => $penalty
            ]);
        } catch (\Throwable $th) {
            throw new ValidationException('No se pudo actualizar la devolución', 422);
        }
    }
}