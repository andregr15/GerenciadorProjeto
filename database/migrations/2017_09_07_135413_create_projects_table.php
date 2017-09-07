<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao');
            $table->smallInteger('progresso');
            $table->string('status', 50);
            $table->date('data_vencimento');
            $table->timestamps();

            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
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
