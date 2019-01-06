<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddProfileImageAndSocialLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('profile_image_url', 256)->nullable()->default('https://billionairesdrive.com/img/default-profile.jpg');
            $table->string('facebook_link', 128)->nullable();
            $table->string('twitter_link', 128)->nullable();
            $table->string('instagram_link', 128)->nullable();
            $table->string('youtube_link', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('profile_image_url');
            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('instagram_link');
            $table->dropColumn('youtube_link');
        });
    }
}
