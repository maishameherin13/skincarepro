<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Adding user_id column
            $table->string('username');
            $table->string('product_name');
            $table->text('review');
            $table->integer('likes')->default(0); // Adding likes column
            $table->integer('dislikes')->default(0); // Adding dislikes column
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
