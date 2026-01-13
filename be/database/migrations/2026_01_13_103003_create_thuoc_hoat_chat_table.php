<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('thuoc_hoat_chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_thuoc')->constrained('thuocs')->onDelete('cascade');
            $table->foreignId('id_hoat_chat')->constrained('hoat_chats')->onDelete('cascade');
            $table->enum('vai_tro', ['chinh', 'phu'])->default('chinh');
            $table->string('ham_luong')->nullable();

            $table->unique(['id_thuoc', 'id_hoat_chat']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thuoc_hoat_chat');
    }
};
