<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->text('info');
            $table->string('solution');
            $table->string('image');

            $table->integer('experience_gains')->nullable();
            $table->integer('gold_rewards')->nullable();

            $table->integer('required_level')->unsigned()->default(1);
            $table->foreign('required_level')->references('id')->on('levels')->onDelete('restrict');

            // Nested Sets
            // An easy way to visualize how a nested set works is to think of a parent entity surrounding all of its children,
            // and its parent surrounding it, etc.
            $table->integer('parent_id')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();


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
        Schema::dropIfExists('quests');
    }
}
