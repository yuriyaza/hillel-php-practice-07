<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $categories) {
            $categories->id();
            $categories->string('name', 30)->unique();
            $categories->string('description')->nullable();

            $categories->timestamp('created_at')->useCurrent();
            $categories->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
