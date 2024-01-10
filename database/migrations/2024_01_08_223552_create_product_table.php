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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->unsignedInteger('id')->nullable(false)->unique();
            $table->string('title')->nullable();
            $table->unsignedDecimal('price')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->unsignedDecimal('rate')->nullable();
            $table->unsignedInteger('count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
