<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'document_type_id',
        'document_number',
        'birth_date',
        'phone_number',
        'direction'
    ];

    /**
     * The attributes that should be cast.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date'
    ];

    /**
     * Get the document type that owns the client.
     */
    public function documentType() {
        return $this->belongsTo(DocumentType::class);
    }
    
}