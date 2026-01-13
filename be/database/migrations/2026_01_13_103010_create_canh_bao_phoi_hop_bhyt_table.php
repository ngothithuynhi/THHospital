<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('canh_bao_phoi_hop_bhyt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hoat_chat_1')->constrained('hoat_chats')->onDelete('cascade');
            $table->foreignId('id_hoat_chat_2')->constrained('hoat_chats')->onDelete('cascade');
            $table->foreignId('id_icd')->nullable()->constrained('icds')->onDelete('cascade');

            $table->enum('muc_do', ['cam_phoi_hop', 'khong_khuyen_nghi', 'can_can_nhac']);
            $table->text('ly_do')->nullable();
            $table->text('ghi_chu')->nullable();

            $table->unique(['id_hoat_chat_1', 'id_hoat_chat_2', 'id_icd'], 'canh_bao_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('canh_bao_phoi_hop_bhyt');
    }
};
