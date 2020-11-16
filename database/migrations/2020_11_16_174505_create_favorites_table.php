<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favoritable_id');
            $table->unsignedBigInteger('user_id');
            $table->string('favoritable_type');

            $table->foreign('user_id')
                ->references('id')
                ->on('default_users')
                ->onDelete('cascade');


            $table->unique(['user_id', 'favoritable_id', 'favoritable_type']);

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
        Schema::dropIfExists('favorites');
    }
}
