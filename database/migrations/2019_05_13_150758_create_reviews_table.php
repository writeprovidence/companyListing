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
            $table->string('email');
            $table->string('service');
            $table->string('site')->nullable();
            $table->string('previous_hosting')->nullable();
            $table->string('social_profile')->nullable();
            $table->integer('logged_user_id')->nullable();
            $table->string('title');
            $table->text('review');
            $table->string('review_ip');
            $table->string('reliability')->default(0);
            $table->string('pricing')->default(0);
            $table->string('feature')->default(0);
            $table->string('user_friendly')->default(0);
            $table->string('support')->default(0);
            $table->string('features')->default(0);
            $table->string('score')->default(0);
            $table->string('verification_ip')->nullable();
            $table->string('verification_time')->nullable();
            $table->integer('is_verified')->default(0);
            $table->integer('is_public')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->text('response')->nullable();
            $table->integer('response_user_id')->nullable();
            $table->timestamp('response_timestamp')->nullable();
            $table->string('response_ip')->nullable();
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
