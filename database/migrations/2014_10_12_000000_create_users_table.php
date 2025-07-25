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
            $table->increments('user_id');
            $table->tinyInteger('privilege')->default(0);
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('auth_provider')->nullable();
            $table->string('auth_provider_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name')->default('N/A')->nullable();
            $table->string('imagePath')->default('defaultuser.png')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('language')->nullable();
            $table->string('about')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
