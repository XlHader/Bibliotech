<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Loan;

class ValidationLoanRulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('max_unreturned_loans', function ($attribute, $value, $parameters, $validator) {
            $clientId = $value;
            $maxUnreturnedLoans = $parameters[0];

            $unreturnedLoans = Loan::whereClientId($clientId)
                ->whereDoesntHave('refunds')
                ->count();

            return $unreturnedLoans < $maxUnreturnedLoans;
        });

        Validator::extend('max_late_refunds', function ($attribute, $value, $parameters, $validator) {
            $clientId = $value;
            $maxLateRefunds = $parameters[0];

            $lateRefunds = Loan::whereClientId($clientId)
                ->join('refunds', 'refunds.loan_id', '=', 'loans.id')
                ->select('refunds.*', 'loans.return_date_limit')
                ->whereColumn('refunds.refund_date', '>', 'loans.return_date_limit')
                ->count();

            return $lateRefunds < $maxLateRefunds;
        });
    }

}