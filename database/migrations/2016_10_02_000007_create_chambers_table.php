<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('floor')->unsigned();
            $table->integer('beds_total_count')->unsigned();
            $table->integer('beds_occupied_count')->unsigned();

            $table->string('chamber_sex');


            $table->integer('hospital_department_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('chambers',function (Blueprint $table){
            $table->unique(array('hospital_department_id', 'number'));
            $table->foreign('hospital_department_id')->references('id')->on('hospital_departments')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chambers');
    }
}
