<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleForeignkeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::table('users', function (Blueprint $table) {
        $table->integer('role_id')->default('2')->unsigned();
        $table->foreign('role_id')->references('id')->on('roles');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table){

        $table->dropForeign('users_role_id_foreign');
        $table->dropColumn('role_id');
    });
  }
}
