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
        Schema::create('hoat_chats', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hoat_chat');
            $table->text('ghi_chu')->nullable();
            $table->enum('trang_thai', ['su_dung', 'ngung'])->default('su_dung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoat_chats');
    }
};
