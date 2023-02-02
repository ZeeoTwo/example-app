<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content_comment');
            $table->unsignedBigInteger('author_id');
            $table->index('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->unsignedBigInteger('post_id');
            $table->index('post_id');
            $table->foreign('post_id')->references('id')->on('publications')->onDelete('cascade');
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
