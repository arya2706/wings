<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 3)->nullable();
            $table->string('document_number', 10)->nullable();
            $table->string('produce_code', 18)->nullable();
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit', 5)->nullable();
            $table->integer('sub_total')->nullable();
            $table->string('currency', 5)->nullable();
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
        Schema::dropIfExists('transaction_details');
    }
}
