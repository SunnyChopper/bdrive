<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_course_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->string('title', 128);
            $table->text('description');
            $table->string('video_url', 128)->nullable();
            $table->text('question');
            $table->string('subscribe_url', 128)->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_course_videos');
    }
}
