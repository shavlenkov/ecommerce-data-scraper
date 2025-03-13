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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('retailer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('price')->unsigned();
            $table->integer('stock_count')->unsigned();
            $table->json('rating');
            $table->decimal('avg_rating')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
