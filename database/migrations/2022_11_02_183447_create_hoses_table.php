<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoses', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('name');
            $table->string('part_number');
            $table->string('series_id');
            $table->string('material_id');
            $table->string('inner_diameter');
            $table->string('outer_diameter')->nullable();
            $table->string('app_type');
            $table->string('min_cleaning_temprature');
            $table->string('max_cleaning_temprature');
            $table->string('min_process_temprature');
            $table->string('max_process_temprature');
            $table->string('min_cleaning_pressure');
            $table->string('max_cleaning_pressure');
            $table->string('min_process_pressure');
            $table->string('max_process_pressure');
            $table->string('deration');
            $table->longText('description');
            $table->string('price');
            $table->string('max_length');
            $table->string('end_style_1');
            $table->string('end_style_2');
            $table->string('collar_id');
            $table->string("connection_size_1");
            $table->string("connection_size_2");
            $table->string('unit_of_measure');
            $table->string('full_coil_oal');
            $table->string('image')->nullable();
            $table->string('requirments');
            $table->string('regulations');
            $table->boolean('factory_assembly');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoses');
    }
};
