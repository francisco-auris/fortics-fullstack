<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSodasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sodas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->string('flavor', '50');
            $table->bigInteger('litigation_id')->unsigned();
            $table->decimal('value_unit',8,2);
            $table->integer('stock');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('litigation_id')->references('id')->on('litigations');
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
        Schema::dropIfExists('sodas');
    }
}
