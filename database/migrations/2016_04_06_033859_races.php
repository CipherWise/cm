<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Races extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('race', 30)->default(null);
            $table->string('ability_bonus', 12)->default(null);
            $table->string('ability_penalty', 12)->default(null);
            $table->string('size', 10)->default(null);
            $table->string('type', 20)->default(null);
            $table->string('subtype', 20)->default(null);
            $table->integer('speed')->default(null);
            $table->string('starting_languages', 60)->default(null);
            $table->string('senses', 60)->default(null);
            $table->string('defensive_traits', 60)->default(null);
            $table->string('offensive_traits', 60)->default(null);
            $table->string('skill_bonus', 60)->default(null);
            $table->string('bonus_feats', 60)->default(null);
            $table->string('special_abilities', 255)->default(null);
            $table->integer('race_points')->default(null);
            $table->string('resistences', 255)->default(null);
            $table->string('weaknesses', 255)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('races');
    }
}
