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
        Schema::create('routes', function (Blueprint $table) {
            $table->id("routeID");
            $table->string("busNo");
            $table->foreign("busNo")->references("busNo")->on("buses");
            $table->string("startingStationID");
            $table->foreign("startingStationID")->references("stationID")->on("stations");
            $table->string("endingStationID");
            $table->foreign("endingStationID")->references("stationID")->on("stations");
            $table->integer("fare");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
