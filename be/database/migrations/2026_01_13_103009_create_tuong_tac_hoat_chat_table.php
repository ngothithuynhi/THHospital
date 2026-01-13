<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tuong_tac_hoat_chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hoat_chat_1')->constrained('hoat_chats')->onDelete('cascade');
            $table->foreignId('id_hoat_chat_2')->constrained('hoat_chats')->onDelete('cascade');
            $table->enum('muc_do', ['nghiem_trong', 'can_theo_doi', 'an_toan']);
            $table->text('mo_ta')->nullable();
            $table->text('xu_tri_goi_y')->nullable();

            $table->unique(['id_hoat_chat_1', 'id_hoat_chat_2']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tuong_tac_hoat_chat');
    }
};
