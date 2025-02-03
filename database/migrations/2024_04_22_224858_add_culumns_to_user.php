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
        Schema::table('users', function (Blueprint $table) {
            $table->string("photo_path")->default('avatars/default.png')->after("email");
            $table->string("location")->nullable();
            $table->string("country")->default("RDC");
            $table->longText("about")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("photo_path");
            $table->dropColumn("location");
            $table->dropColumn("country");
            $table->dropColumn("about");
        });
    }
};
