<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadMagnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_magnets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('subtitle', 256);
            $table->text('description');
            $table->string('slug', 64);
            $table->string('image_url', 256)->nullable();
            $table->string('youtube_video_url', 128)->nullable();
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
        Schema::dropIfExists('lead_magnets');
    }
}
