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
        Schema::create('credit_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creditorID')->constrained('creditor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('productID')->constrained('product')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('total', 8,2)->default(0.00);
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_product');
    }
};
