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
        Schema::create('ticket_canceltb', function (Blueprint $table) {
            $table->id('cancelID');
            $table->string("busNo");
            $table->unsignedBigInteger("userID");
            $table->foreign("userID")->references("userID")->on("usertb");
            $table->integer("seatNo");
            $table->integer("fare");
            $table->string("Source");
            $table->string("Destination");
            $table->string("Status");
            $table->date("busDate");
            $table->time("busTime");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_canceltb');
    }
};
