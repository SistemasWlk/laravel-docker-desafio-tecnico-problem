<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 11)->nullable(false)->unique();
            $table->string('name', 100)->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->unsignedBigInteger('id_client_type')->nullable(false);
            $table->foreign('id_client_type')->references('id')->on('client_types');            
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
        Schema::dropIfExists('clients');
    }
}
