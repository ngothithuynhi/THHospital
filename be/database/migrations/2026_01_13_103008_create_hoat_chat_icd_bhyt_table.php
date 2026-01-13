<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoat_chat_icd_bhyt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hoat_chat')->constrained('hoat_chats')->onDelete('cascade');
            $table->foreignId('id_icd')->constrained('icds')->onDelete('cascade');
            $table->boolean('duoc_bhyt_chap_nhan')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hoat_chat_icd_bhyt');
    }
};
