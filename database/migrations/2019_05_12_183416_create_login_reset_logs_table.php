<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginResetLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_reset_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('email_link')->nullable();
            $table->string('requestor_ip');
            $table->boolean('status')->nullable();
            $table->string('confirmation_ip')->nullable();
            $table->timestamp('confirmation_timestamp')->nullable();
            $table->boolean('link_clicked')->default(0);
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
        Schema::dropIfExists('login_reset_logs');
    }
}
