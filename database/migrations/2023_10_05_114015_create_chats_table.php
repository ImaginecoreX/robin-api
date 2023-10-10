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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('user_from');
            $table->string('user_to');
            $table->longText('msg');
            $table->dateTime('date');
            $table->foreignId('msg_status_id')->references('id')->on('msg_statuses') ;
            $table->foreign('user_from')->references('username')->on('users');
            $table->foreign('user_to')->references('username')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
