<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('phone')->default('unverified');
            $table->string('amount');
            $table->string('message');
            $table->string('donation_status')->default('unverified');
            $table->string('token')->default('unverified');
            $table->unsignedBigInteger('streamer_id');
            $table->foreign('streamer_id')->references('id')->on('streamers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('donors')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
