<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('devolucao')->default(false)->nullable(false);
            $table->date('date_cad')->nullable(false);
            $table->unsignedBigInteger('id_client')->nullable(false);
            $table->unsignedBigInteger('id_book')->nullable(false);
            $table->timestamps();
            $table->foreign('id_client')->references('id')->on('clients'); 
            $table->foreign('id_book')->references('id')->on('books'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
