<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigInteger('user_id')->unsigned()->index();
            $table->morphs('favoriteable');
            $table->timestamps();

            $table->primary(['user_id', 'favoriteable_id', 'favoriteable_type']);

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
        Schema::dropIfExists('favorites');
    }
}
