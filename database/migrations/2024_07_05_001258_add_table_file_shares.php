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
        // Schema::create('file_shares', function (Blueprint $table) {
        // $table->id();   
        //     $table->bigInteger('receiver_id');
        //     $table->bigInteger('file_id');
        //     $table->foreign('receiver_id')->references('id')->on('users');
        //     $table->foreign('file_id')->references('id')->on('files');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file_shares', function (Blueprint $table) {
            $table->dropIfExists('file_shares');
        });
    }
};
