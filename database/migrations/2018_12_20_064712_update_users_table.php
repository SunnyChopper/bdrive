<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('username', 128);
            $table->datetime('last_login_time');
            $table->integer('num_logins')->default(1);
            $table->integer('is_active')->default(1);
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
            $table->string('name');
            $table->dropColumn('first_name', 64);
            $table->dropColumn('last_name', 64);
            $table->dropColumn('username', 128);
            $table->dropColumn('last_login_time');
            $table->dropColumn('num_logins')->default(1);
            $table->dropColumn('is_active')->default(1);
        });
    }
}
