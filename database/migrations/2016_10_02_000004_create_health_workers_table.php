<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio');
            $table->string('sex', 7);
            $table->date('birth_date');
            $table->string('post');

            $table->integer('login_id')->unsigned()->nullable();

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::table('health_workers',function (Blueprint $table){
            $table->foreign('login_id')->references('id')->on('users')
                ->onUpdate('set null');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_workers');
    }
}
