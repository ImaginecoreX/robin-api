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
        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('fname',20);
            $table->string('lname',20);
            $table->string('email',100);
            $table->string('password',100);
            $table->longText('bio');
            $table->string('profile_url');
            $table->string('points');
            $table->foreignId('gender_id')->references('id')->on('genders') ;
            $table->foreignId('status_id')->references('id')->on('statuses') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
