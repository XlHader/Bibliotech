<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            // Columns
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('author')->nullable(false);
            $table->integer('number_pages')->nullable(false);
            $table->string('icon')->nullable(true)->default('');
            $table->string('isbn_code')->nullable(false)->unique();
            $table->integer('category_id')->nullable(false);
            $table->boolean('is_avaible')->nullable(false)->default(true);
            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            // Soft delete
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};