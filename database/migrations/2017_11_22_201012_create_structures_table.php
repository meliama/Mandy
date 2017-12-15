<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('name', 45);
            $table->string('surname', 100);
            $table->string('username', 45);
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('img_profile',100);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
      });

      Schema::create('categories', function (Blueprint $table) {
        $table->increments('id')->unsigned()->unique();
        $table->String('name');
        $table->timestamps();
        $table->softDeletes();
      });

      Schema::create('sellers', function (Blueprint $table) {
        $table->increments('id')->unsigned()->unique();
        $table->String('location', 45);
        $table->String('description', 300);
        $table->boolean('services');
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
        $table->timestamps();
        $table->softDeletes();
      });

      Schema::create('products', function (Blueprint $table) {
        $table->increments('id')->unsigned()->unique();
        $table->String('name');
        $table->double('price');
        $table->integer('stock');
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
        $table->timestamps();
        $table->softDeletes();
      });

      Schema::create('carts', function (Blueprint $table) {
        $table->increments('id')->unsigned()->unique();
        $table->integer('quantity');
        $table->double('total_price');
        $table->dateTime('bought_date');
        $table->integer('user_id')->unsigned();            $table->foreign('user_id')->references('id')->on('users');
        $table->timestamps();
        $table->softDeletes();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('categories');
      Schema::dropIfExists('sellers');
      Schema::dropIfExists('products');
      Schema::dropIfExists('carts');
      Schema::dropIfExists('users');
    }
}
