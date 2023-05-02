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
        Schema::create('bookingtb', function (Blueprint $table) {
            $table->id("ticketID");
            $table->string("busNo");
            $table->foreign("busNo")->references("busNo")->on("buses");
            $table->unsignedBigInteger("userID");
            $table->foreign("userID")->references("userID")->on("usertb");
            $table->integer("seatNo");
            $table->integer("fare");
            $table->string("from");
            $table->string("to");
            $table->date("date");
            $table->time("time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookingtb');
    }
};
