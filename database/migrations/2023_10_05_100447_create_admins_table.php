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
        Schema::create('admins', function (Blueprint $table) {
            $table->string('email',100)->primary();
            $table->string('fname',20);
            $table->string('lname',25);
            $table->string('password',10);
            $table->foreignId('admin_type_id')->references('id')->on('admin_types');
            $table->foreignId('admin_status_id')->references('id')->on('admin_statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
