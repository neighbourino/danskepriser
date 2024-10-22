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
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('query')->nullable();
            $table->string('api_item_id')->nullable();
            $table->string('api_store_id')->nullable();
            $table->string('api_category')->nullable();
            $table->string('store')->nullable();
            $table->bigInteger('store_id')->nullable();
            $table->boolean('is_staple')->default(false);
            $table->boolean('is_offer')->default(false);
            $table->boolean('bio')->default(false);
            $table->boolean('vegan')->default(false);
            $table->boolean('vegetarian')->default(false);
            $table->boolean('gluten_free')->default(false);
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
