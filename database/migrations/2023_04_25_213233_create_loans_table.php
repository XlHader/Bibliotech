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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable(false);
            $table->unsignedBigInteger('book_id')->nullable(false);
            $table->date('loan_date')->nullable(false)->default(now());
            $table->date('return_date_limit')->nullable(false)->default(now()->addDays(15));

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('book_id')->references('id')->on('books');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};