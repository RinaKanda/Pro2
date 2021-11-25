<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->integer('clinic_id')->primary();
            $table->string('clinic_name');
            $table->string('address');
        });

        Schema::create('vaccination_datas', function (Blueprint $table) {
            $table->integer('vaccination_data_id')->primary();
            $table->integer('clinic_id');
            $table->date('vaccination_date');
            $table->time('vaccination_time');
            $table->integer('capacity');
            $table->integer('reserve_counts');
            $table->integer('cancel');

            $table->foreign('clinic_id')->references('clinic_id')->on('clinics');
        });

        Schema::create('reserve_people', function (Blueprint $table) {
            $table->integer('Reserve_person_id')->primary();
            $table->string('tickets_number');
            $table->string('birthday');
        });

        Schema::create('reserves', function (Blueprint $table) {
            $table->integer('reserve_id')->primary();
            $table->integer('reserve_person_id');
            $table->integer('vaccination_data_id');
            $table->string('email');
            $table->dateTime('created_at');

            $table->foreign('vaccination_data_id')->references('vaccination_data_id')->on('vaccination_datas');
            $table->foreign('reserve_person_id')->references('reserve_person_id')->on('reserve_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
        Schema::dropIfExists('reserve_people');
        Schema::dropIfExists('vaccination_datas');
        Schema::dropIfExists('clinics');
    }
}
