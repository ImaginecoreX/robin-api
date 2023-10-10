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
        Schema::create('user_fav_categories', function (Blueprint $table) {
            $table->id();
            $table->string("user_username");
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->timestamps();

            $table->foreign('user_username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_fav_categories');
    }
};
