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
        Schema::create('payment', function (Blueprint $table) {
            $table->id('paymentID');
            $table->unsignedBigInteger('userID');
            $table->foreign("userID")->references("userID")->on("usertb");
            $table->integer('fare');
            $table->string('paymentProof');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
