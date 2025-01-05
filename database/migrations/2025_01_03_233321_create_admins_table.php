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
            $table->id(); // Primary Key
            $table->string('name'); // Admin's name
            $table->string('email')->unique(); // Unique email
            $table->timestamp('email_verified_at')->nullable(); // For email verification
            $table->string('password'); // Hashed password
            $table->string('remember_token', 100)->nullable(); // "Remember Me" token
            $table->timestamps(); // created_at and updated_at
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