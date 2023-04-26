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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id')->nullable(false);
            $table->date('refund_date')->nullable(false)->default(now());
            $table->integer('days_of_delay')->nullable(true)->default(0);
            $table->integer('penalty')->nullable(true)->default(0);

            $table->foreign('loan_id')->references('id')->on('loans');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};