<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Webmozart\Assert\InvalidArgumentException;

class LoanService
{
    public static function getAvaibleBooks($booksIds)
    {
        $avaibleBooksIds = Book::whereIn('id', $booksIds)
            ->where('is_avaible', true)
            ->pluck('id')
            ->toArray();

        return $avaibleBooksIds;
    }

    public static function validateAvailableBooks($avaibleBooksIds)
    {
        if (count($avaibleBooksIds) == 0)
            throw new InvalidArgumentException('De los libros seleccionados ninguno se encuentra disponible');
    }

    public static function getBooksTitles($booksIds)
    {
        $booksTitles = Book::whereIn('id', $booksIds)
            ->pluck('title')
            ->toArray();

        return implode(', ', $booksTitles);
    }

    public static function createLoansArray($clientId, $avaibleBooksIds)
    {
        return collect($avaibleBooksIds)->map(function ($bookId) use ($clientId) {
            return [
                'client_id' => $clientId,
                'book_id' => $bookId,
                'loan_date' => now(),
                'return_date_limit' => now()->addDays(15),
                'created_at' => now(),
                'updated_at' => now()
            ];
        })->toArray();
    }

    public static function saveLoansAndMarkBooksAsUnavailable($loans, $avaibleBooksIds)
    {
        DB::transaction(function () use ($loans, $avaibleBooksIds) {
            Loan::insert($loans);
            Book::whereIn('id', $avaibleBooksIds)
                ->update(['is_avaible' => false]);
        });
    }

}