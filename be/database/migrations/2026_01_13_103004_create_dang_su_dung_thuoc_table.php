<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dang_su_dung_thuoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_thuoc')->constrained('thuocs')->onDelete('cascade');
            $table->foreignId('id_duong_dung')->constrained('duong_dungs')->onDelete('cascade');
            $table->string('dang_bao_che')->nullable();
            $table->text('cach_pha_che')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->enum('trang_thai', ['su_dung', 'ngung'])->default('su_dung');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dang_su_dung_thuoc');
    }
};
