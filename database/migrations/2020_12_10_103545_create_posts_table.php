<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('author_id')->nullable(false);
            $table->unsignedMediumInteger('visits_count')->default(0);
            $table->enum('status', ['draft', 'published']);
            $table->string('title', 255)->nullable(false);
            $table->string('slug', 255)->nullable(false)->unique();
            $table->text('body')->nullable(false);
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
        Schema::dropIfExists('posts');
    }
}
