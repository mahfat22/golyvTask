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
        Schema::create('booked_seates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_from')->constrained('stations');
            $table->foreignId('station_to')->constrained('stations');
            $table->integer('seat_id')->constrained('seats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_seates');
    }
};
