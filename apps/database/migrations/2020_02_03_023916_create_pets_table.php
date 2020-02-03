<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pets', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->integer('user_id');
          $table->integer('age');
          $table->integer('gender');
          $table->integer('animal_category_id');
          $table->integer('price');
          $table->text('body');
          $table->string('pic1');
          $table->string('pic2')->nullable();
          $table->string('pic3')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('pets');
    }
}
