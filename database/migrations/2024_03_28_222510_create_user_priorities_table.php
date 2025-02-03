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
        Schema::create('user_priorities', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('host_files');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('host_files')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_priorities');
    }
};
