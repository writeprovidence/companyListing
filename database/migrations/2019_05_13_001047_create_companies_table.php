<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->string('link_to_go');
            $table->string('score')->deafult(0);
            $table->text('description');
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->boolean('is_public')->default(0);
            $table->integer('clicks_sent')->default(0);
            $table->integer('page_views')->default(0);
            $table->string('alexa_global_rank')->default(0);
            $table->string('alexa_top_country_id')->default(0);
            $table->string('alexa_country_rank')->default(0);
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
        Schema::dropIfExists('companies');
    }
}
