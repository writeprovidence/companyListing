<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlexaLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alexa_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('alexa_global_rank');
            $table->string('alexa_top_country_id');
            $table->string('alexa_country_rank');
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
        Schema::dropIfExists('alexa_logs');
    }
}
