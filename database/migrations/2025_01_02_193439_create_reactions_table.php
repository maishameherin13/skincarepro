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
    Schema::create('reactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');  // User who reacted
        $table->foreignId('comment_id')->constrained()->onDelete('cascade');  // Comment that was reacted to
        $table->string('reaction_type'); 
        $table->timestamps();
    });
   }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
