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
        Schema::create('ace_prices', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('qty');
            $table->string('unit_price');
            $table->string('unit_of_measure');
            $table->string('description');
            $table->string('bulk_price');
            $table->string('bulk_unit_of_measure');
            $table->string('coil_length');
            $table->string('assembly_charge')->nullable();
            $table->boolean('factory_assembly');
            $table->string('net_price');
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
        Schema::dropIfExists('ace_prices');
    }
};
