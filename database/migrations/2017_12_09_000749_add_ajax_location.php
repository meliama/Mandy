<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAjaxLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('users', function (Blueprint $table){
          $table->string('country', 150)->nullable();
          $table->string('region', 150)->nullable();
          $table->string('city', 150)->nullable();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->dropColumn('country');
        $table->dropColumn('region');
        $table->dropColumn('city');
    }
}
