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
        Schema::create('user__games', function (Blueprint $table) {
            $table->increments("user_game_id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("game_id");
            $table->unsignedInteger("playtime")->default(0);
            $table->tinyInteger("like_dislike")->default(0);
            $table->string("review")->nullable();
            $table->boolean("bookmark")->default(false);
            $table->timestamps();

            $table->foreign("user_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->foreign("game_id")->references("game_id")->on("games")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__games');
    }
};
