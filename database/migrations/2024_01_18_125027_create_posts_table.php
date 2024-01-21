<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $posts) {
            $posts->id();
            $posts->string('title', 100);
            $posts->string('content');

            $posts->unsignedBigInteger('category_id');
            $posts->foreign('category_id')->references('id')->on('categories');

            $posts->timestamp('created_at')->useCurrent();
            $posts->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
