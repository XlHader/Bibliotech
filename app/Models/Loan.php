<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'book_id',
        'loan_date',
        'return_date_limit'
    ];

    /**
     * The attributes that should be cast.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'loan_date' => 'date',
        'return_date_limit' => 'date'
    ];

    /**
     * Get the client that owns the loan.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the book that owns the loan.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the refunds for the loan.
     */
    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }
}