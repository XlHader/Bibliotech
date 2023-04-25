<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'number_pages',
        'icon',
        'isbn_code',
        'category_id',
        'is_avaible'
    ];

    /**
     * Get the category that owns the book.
     */
    public function bookCategory()
    {
        return $this->belongsTo(Category::class);
    }
}
