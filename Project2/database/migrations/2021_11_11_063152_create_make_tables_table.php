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
        Schema::create('places', function (Blueprint $table) {
            $table->integer('place_id')->primary();
            $table->string('place_name');
            $table->string('address');
        });

        Schema::create('reservation_datas', function (Blueprint $table) {
            $table->integer('reservation_data_id')->primary();
            $table->integer('place_id');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->integer('capacity');
            $table->integer('reserve_counts');
            $table->integer('cancel')->default(0);

            $table->foreign('place_id')->references('place_id')->on('places');
        });

        Schema::create('reserve_people', function (Blueprint $table) {
            $table->integer('Reserve_person_id')->primary();
            $table->string('tickets_number');
            $table->date('birthday');
            $table->string('pass');
            $table->string('email');
            $table->string('family_name');
            $table->string('first_name');
        });

        Schema::create('reserves', function (Blueprint $table) {
            $table->integer('reserve_id')->primary();
            $table->integer('reserve_person_id');
            $table->integer('reservation_data_id');
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            $table->foreign('reservation_data_id')->references('reservation_data_id')->on('reservation_datas');
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
        Schema::dropIfExists('reservation_datas');
        Schema::dropIfExists('places');
    }
}