<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name', 100)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('image_path', 150)->nullable();
            $table->string('production_time', 15)->nullable();
            $table->string('leader_name', 30)->nullable();
            $table->tinyInteger('class_id');
            $table->string('team_name', 30)->nullable();
            $table->string('team_member', 120)->nullable();
            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('season_id');
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
        Schema::dropIfExists('projects');
    }
}
