<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('vendorName');
            $table->string('shopName');
            $table->string('altPhone');
            $table->string('address');
            $table->string('landLine');
            $table->string('fax');
            $table->string('documentProof');
            $table->string('companiesDealWith')->nullable();
            $table->string('sellingCapacity');
            $table->integer('payAcceptMethod_id');

            $table->timestamps();


            $table->index('user_id');
            $table->index('payAcceptMethod_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
