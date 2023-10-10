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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->longText('body');
            $table->foreignId('comment_id')->references('id')->on('comments');
            $table->string('user_username');
            $table->foreignId('status_id')->references('id')->on('comment_stats');       
            $table->timestamps();

            $table->foreign('user_username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
