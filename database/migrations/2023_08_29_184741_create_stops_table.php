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
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id');
            $table->foreignId('city_from_id');
            $table->foreignId('city_to_id');
            $table->dateTime('datetime_from')->comment('off time from stop 1');
            $table->dateTime('datetime_to')->comment('arrival time to stop 2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stops');
    }
};
