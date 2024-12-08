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
        Schema::create('controls', function (Blueprint $table) {
            $table->increments("control_id");
            $table->unsignedInteger("game_id");
            $table->unsignedInteger("control_type_id");
            $table->timestamps();

            $table->foreign("game_id")->references("game_id")->on("games")->onDelete("cascade");
            $table->foreign("control_type_id")->references("control_type_id")->on("control__types")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
