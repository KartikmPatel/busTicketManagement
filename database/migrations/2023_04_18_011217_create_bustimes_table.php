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
        Schema::create('bustimes', function (Blueprint $table) {
            $table->string("busNo");
            $table->foreign("busNo")->references("busNo")->on("buses");
            $table->unsignedBigInteger("routeID");
            $table->foreign("routeID")->references("routeID")->on("routes");
            $table->date("date");
            $table->time("departureTime");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bustimes');
    }
};
