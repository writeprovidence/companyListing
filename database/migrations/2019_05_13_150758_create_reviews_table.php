<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('slug')->nullable();
            $table->string('full_name');
            $table->integer('logged_user_id')->nullable();
            $table->string('title');
            $table->text('review');
            $table->string('review_ip');
            $table->string('reliability')->nullable(); //remove nullable asap
            $table->string('pricing')->nullable(); //remove nullable asap
            $table->string('user_friendly')->nullable(); //remove nullable asap
            $table->string('support')->nullable(); //remove nullable asap
            $table->string('features')->nullable(); //remove nullable asap
            $table->string('services')->nullable();
            $table->string('verification_ip')->nullable();
            $table->string('verification_time')->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
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
        Schema::dropIfExists('reviews');
    }
}
