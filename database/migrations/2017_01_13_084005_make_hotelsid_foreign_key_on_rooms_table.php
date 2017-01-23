<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeHotelsidForeignKeyOnRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('rooms', function (Blueprint $table) {
        $table->foreign('hotel_id')->references('id')->on('hotels');

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
          $table->dropForeign('rooms_hotel_id_foreign');
         });

    }
}
