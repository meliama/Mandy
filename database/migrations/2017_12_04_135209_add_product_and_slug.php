<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductAndSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table){
         //$table->integer('seller_id')->unsigned()->nullable();
         //$table->foreign('seller_id')->references('id')->on('sellers');
         //$table->string('question', 2)->nullable();
         //$table->string('answer', 80)->nullable();
         // $table->string('image', 150)->nullable();
         $table->string('slug', 350)->nullable();
      });


      Schema::table('products', function(Blueprint $table) {
           $table->text('description', 400);
           $table->string('slug', 350) ->nullable();
         });

         Schema::create('images', function(Blueprint $table) {
           $table->increments('id');
           $table->string('src', 300);
           $table->Integer('product_id')->unsigned()->index();
           $table->timestamps();
         });

         Schema::create('orders', function(Blueprint $table) {
           $table->increments('id');
           $table->date('paid_at');
           $table->date('sent_at');
           $table->smallInteger('user_id')->unsigned()->index();
           $table->timestamps();
           $table->softDeletes();
         });

         Schema::create('order_product', function(Blueprint $table) {
           $table->increments('id');
           $table->Integer('order_id')->unsigned()->index();
           $table->Integer('product_id')->unsigned()->index();
           $table->timestamps();
           $table->softDeletes();
         });

         // Schema::create('questions', function(Blueprint $table) {
         //   $table->increments('id');
         //   $table->string('question', 450);
         //   $table->timestamps();
         // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
          //$table->dropColumn('seller_id');
          //$table->dropColumn('question');
          //$table->dropColumn('answer');
          $table->dropColumn('slug');
        });

        Schema::pruducts('users', function (Blueprint $table) {
          //$table->dropColumn('seller_id');
          $table->dropColumn('description');
          $table->dropColumn('slug');
        });

       Schema::dropIfExists('images');
       Schema::dropIfExists('orders');
       Schema::dropIfExists('order_product');
       //Schema::dropIfExists('questions');
    }
}
