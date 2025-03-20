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
        Schema::table('data', function (Blueprint $table) {
            $table->foreignId('product_retailer_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('scraping_session_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data', function (Blueprint $table) {
           $table->dropForeign(['product_retailer_id']);
           $table->dropForeign(['scraping_session_id']);
        });
    }
};
