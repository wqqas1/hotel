<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartneridToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::table('hotels', function (Blueprint $table) {
              $table->integer('partner_id')->unsigned();
              $table->foreign('partner_id')->references('id')->on('partners');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('hotels', function($table)
      {
        $table->dropForeign('hotels_partner_id_foreign');
        $table->dropColumn('partner_id'); });

    }
}
