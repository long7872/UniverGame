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
        Schema::create('games', function (Blueprint $table) {
            $table->increments("game_id");
            $table->string("name");
            $table->string("imagePath");
            $table->unsignedInteger("category_id")->nullable();
            $table->unsignedInteger("total_plays")->default(0);
            $table->unsignedInteger("total_likes")->default(0);
            $table->unsignedInteger("total_dislikes")->default(0);
            $table->float("rating",2,1)->default(0);
            $table->string("descrip");
            $table->timestamps();

            $table->foreign("category_id")
                    ->references("category_id")
                    ->on("categories")
                    ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
