<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalroomsToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('rooms', function (Blueprint $table) {
          $table->integer('TotalRooms')->unsigned();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('rooms', function($table)
      {
              $table->dropColumn('TotalRooms');
         });

    }
}
