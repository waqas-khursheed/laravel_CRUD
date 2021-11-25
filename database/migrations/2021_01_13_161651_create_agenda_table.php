<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('theater');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('time_zone');
            $table->string('location');
            $table->string('event_type');
            $table->boolean('publish')->default(0);
            //$table->string('source_file_1');
            //$table->string('source_file_2');
            $table->timestamps();

        });
        Schema::table('agenda', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
