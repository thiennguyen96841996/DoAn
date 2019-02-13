<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->datetime('date');
            $table->integer('price');
            $table->integer('status');
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->string('info')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('receipt_tables');
    }
}
