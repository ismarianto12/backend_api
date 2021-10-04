<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tmpurchaseorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmpurchaseorder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('keterangan');
            $table->integer('tmbarang_id');
            $table->integer('tmsuplier_id');
            $table->double('harga'); 
            $table->char('user_id');
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
        //
    }
}
