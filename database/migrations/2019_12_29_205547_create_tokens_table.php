<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->string('token', 64)->unique();
            $table->timestamp('expires_at');
            $table->timestamps();
            $table->primary('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            //今回2038年問題は対応しません(18年も代々使われるシステムを作るつもりはないです)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
