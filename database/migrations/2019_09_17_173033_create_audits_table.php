<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('payMethod');
            $table->unsignedBigInteger('user_paidTo_id');
            $table->unsignedBigInteger('user_paidBy_id');
            $table->string('amount');
            $table->timestamps();

            $table->index('payMethod');
            $table->index('user_paidTo_id');
            $table->index('user_paidBy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
}
