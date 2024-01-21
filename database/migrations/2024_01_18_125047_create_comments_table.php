<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $comments) {
            $comments->id();
            $comments->string('content');

            $comments->unsignedBigInteger('post_id');
            $comments->foreign('post_id')->references('id')->on('posts');

            $comments->timestamp('created_at')->useCurrent();
            $comments->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
