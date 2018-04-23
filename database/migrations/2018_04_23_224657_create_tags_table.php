<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('post_tags', function (Blueprint $table) {
            // No incrementing ID in this particular case
            // However, we do want to make sure the combination of
            // post_id and tag_id is unique. We don't want the
            // same tag applied to the same post more than one
            // time or vice versa.
            $table->primary(['post_id', 'tag_id']);
            $table->integer('post_id');
            $table->integer('tag_id');
            // No timestamps necessary in this case either
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('tags');
    }
}
