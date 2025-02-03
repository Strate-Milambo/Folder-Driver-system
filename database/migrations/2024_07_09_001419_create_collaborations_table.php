<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('collaborations', function (Blueprint $table) {
    //         $table->id();
    //         $table->bigInteger('first_users');
    //         $table->bigInteger('second_users');
    //         $table->foreign('first_users')->references('id')->on('users')->onUpdate('cascade');
    //         $table->foreign('second_users')->references('id')->on('users')->onUpdate('cascade');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
