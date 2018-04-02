<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('image');
            $table->string('image_sm');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('experience')->unsigned()->default(0);
            $table->integer('available_attribute_points')->unsigned()->default(10);

            $table->integer('gold')->default(0);

            // attributes
            $table->integer('strength')->unsigned()->default(1);
            $table->integer('dexterity')->unsigned()->default(1);
            $table->integer('constitution')->unsigned()->default(1);
            $table->integer('intelligence')->unsigned()->default(1);
            $table->integer('charisma')->unsigned()->default(1);

            // stats
            $table->integer('hit_points');
            $table->integer('total_hit_points');

            // statistics
            $table->integer('battles_won')->default(0);
            $table->integer('battles_lost')->default(0);


            $table->integer('level_id')->unsigned()->default(1);
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('restrict');


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
        Schema::dropIfExists('characters');
    }
}
