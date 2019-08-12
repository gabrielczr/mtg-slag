<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->unique();
            $table->integer('cost')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        // Schema::create('card_deck', function (Blueprint $table) {
        //     $table->integer('deck_id');
        //     $table->integer('card_id');
        //     $table->integer('quantity');
        // });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
