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
        Schema::create('hose_assemblies', function (Blueprint $table) {
            $table->id();
            $table->string("hose_id");
            $table->string("model");
            $table->string("collar_id");
            $table->string("min_length");
            $table->string("max_length");
            $table->string("step_up_1")->nullable();
            $table->string("step_up_2")->nullable();
            $table->string("end_style_1");
            $table->string("end_style_2");
            $table->string("connection_size_1");
            $table->string("connection_size_2");
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
        Schema::dropIfExists('hose_assemblies');
    }
};
