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
        Schema::create('reply_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reply_id')->references('id')->on('replies');
            $table->string('user_username');

            $table->foreign('user_username')->references('username')->on('users') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_reports');
    }
};
