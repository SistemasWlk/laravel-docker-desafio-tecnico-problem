<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_ones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('height_one', 8, 2)->nullable(false);
            $table->float('height_two', 8, 2)->nullable(false);
            $table->float('height_one_future', 8, 2)->nullable(false);
            $table->float('height_two_future', 8, 2)->nullable(false);
            $table->float('result', 8, 2)->nullable(false);
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
        Schema::dropIfExists('problem_ones');
    }
}
