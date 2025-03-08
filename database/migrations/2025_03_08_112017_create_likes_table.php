<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('likeable_id');
            $table->string('likeable_type');
            $table->timestamp('created_at')->useCurrent();
            $table->index(['likeable_id', 'likeable_type']);

            // Уникальный индекс, чтобы пользователь не мог лайкнуть одну сущность дважды
            $table->unique(['user_id', 'likeable_id', 'likeable_type'], 'unique_like');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
