<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattleTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle_turns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('damage');

            $table->integer('current_enemy_hit_points');
            $table->integer('current_character_hit_points');

            $table->integer('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('restrict');

            $table->integer('enemy_id')->unsigned();
            $table->foreign('enemy_id')->references('id')->on('enemies')->onDelete('restrict');

            $table->integer('battle_round_id')->unsigned();
            $table->foreign('battle_round_id')->references('id')->on('battle_rounds')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battle_turns');
    }
}
