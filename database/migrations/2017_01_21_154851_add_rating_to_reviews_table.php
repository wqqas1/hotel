<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatingToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reviews', function (Blueprint $table) {
          $table->integer('rating')->default(0)->unsigned();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('reviews', function($table)
      {
              $table->dropColumn('rating');
         });
    }
}
