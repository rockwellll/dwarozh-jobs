<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('business_user_id');
            $table->unsignedBigInteger('job_type_id');
            $table->text('content');
            $table->date('deadline');
            $table->timestamps();


            $table->foreign('business_user_id')
                ->references('id')
                ->on('business_users')
                ->onDelete('cascade');

            $table->foreign('job_type_id')
                ->references('id')
                ->on('job_types')
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
        Schema::dropIfExists('jobs');
    }
}
