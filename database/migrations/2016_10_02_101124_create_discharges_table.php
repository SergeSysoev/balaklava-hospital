<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('discharge_date');
            $table->string('result_epicrisis');
            $table->enum('discharge_type', array('discharge', 'transfer', 'death', 'other'));

            $table->integer('patient_id')->unsigned();
            $table->integer('discharge_hospital_id')->unsigned()->nullable();
            $table->integer('discharge_department_id')->unsigned()->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('discharges',function (Blueprint $table){
            $table->foreign('patient_id')->references('id')->on('patients')
                ->onUpdate('cascade');
            $table->foreign('discharge_hospital_id')->references('id')->on('hospitals')
                ->onUpdate('cascade');
            $table->foreign('discharge_department_id')->references('id')->on('hospital_departments')
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
        Schema::drop('discharges');
    }
}