<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_request_id'); //Quotation for Request ID
            $table->unsignedBigInteger('user_id'); //Quotation Maker ID
            $table->text('quotationDetail'); // Quotation in Detail in json
            $table->timestamps();

            $table->index('order_request_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
