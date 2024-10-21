<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('api_offer_id')->nullable();
            $table->string('offer_heading')->nullable();
            $table->text('offer_description')->nullable();
            $table->bigInteger('price')->nullable();
            $table->json('quantity_unit')->nullable();
            $table->json('quantity_size')->nullable();
            $table->json('quantity_pieces')->nullable();
            $table->string('store')->nullable();
            $table->dateTime('run_from')->nullable();
            $table->dateTime('run_till')->nullable();
            $table->dateTime('publish')->nullable();
            $table->string('api_store_id')->nullable();
            $table->bigInteger('store_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
