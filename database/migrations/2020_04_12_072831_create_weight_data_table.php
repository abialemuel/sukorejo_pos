<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->double('bruto');
            $table->double('netto');
            $table->softDeletes();
            $table->integer('created_by');	
            $table->integer('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_data');
    }
}
