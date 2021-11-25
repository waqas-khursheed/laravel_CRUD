<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateFeeTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();
        /*
        |--------------------------------------------------------------------------
        |Curd
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('feetype', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('name', 99);
            $table->string('dname', 49);
            $table->string('code', 10);        

            /*
            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);
            */

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('feetype')->insert([
            [
                'name' => 'zzz',
                'dname' => 'abc',
                'code' => 'xyz',
                /*'created' => $unixTimeStamp,'register_by' => 1,'modified' => $unixTimeStamp,'modified_by' => 1,'record_deleted' => 0 */
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feetype');
    }
}
