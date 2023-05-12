<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('produce_code', 18)->nullable();
            $table->string('produce_name', 30)->nullable();
            $table->integer('price')->nullable();
            $table->string('currancy', 5)->nullable();
            $table->integer('discount')->nullable();
            $table->string('dimension', 50)->nullable();
            $table->string('unit', 5)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
