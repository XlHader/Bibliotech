<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            // Columns
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false)->default('');
            $table->unsignedTinyInteger('document_type_id')->nullable(false);
            $table->string('document_number')->nullable(false)->unique();
            $table->date('birth_date')->nullable(false);
            $table->string('phone_number')->nullable(true)->default('');
            $table->string('direction')->nullable(true)->default('');
            // Foreign keys
            $table->foreign('document_type_id')->references('id')->on('document_types');
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
        Schema::dropIfExists('clients');
    }
};
