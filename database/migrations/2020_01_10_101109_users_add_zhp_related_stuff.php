<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAddZhpRelatedStuff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('choragiew')->unsigned()->default(0);
            $table->tinyInteger('stopien')->unsigned()->default(0);
            $table->tinyInteger('okk')->unsigned()->default(0);
            $table->string('srodowisko')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('choragiew');
            $table->dropColumn('stopien');
            $table->dropColumn('okk');
            $table->dropColumn('srodowisko');
        });
    }
}
