<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'refund_date',
        'days_of_delay',
        'penalty'
    ];

    protected $casts = [
        'refund_date' => 'date'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
