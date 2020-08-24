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
        Schema::create('transaction', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('type');
            //Fecha
            $table->date('date');
            //Cuenta
            $table->unsignedBigInteger('account_accredit_id')->unsigned()->index()->nullable();
            $table->foreign('account_accredit_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('account_debit_id')->unsigned()->index()->nullable();
            $table->foreign('account_debit_id')->references('id')->on('accounts')->onDelete('cascade');
            //Categoria
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //Detalle y montos
            $table->string('detail');
            $table->double('amount');

            //Usuario
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
