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
            $table->string('product_name', 100);
            $table->string('catchphrase', 50);
            $table->string('description', 300);
            $table->string('image_path', 150)->nullable();
            $table->string('production_time', 15);
            $table->string('leader_name', 30);
            $table->string('team_name', 30);
            $table->string('team_member', 120)->nullable();
            $table->string('genre', 30);
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
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
