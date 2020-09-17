<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_users', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('user_id');


            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->onDelete('cascade');


            $table->foreign('user_id')
                ->references('id')
                ->on('default_users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_applieds');
    }
}
