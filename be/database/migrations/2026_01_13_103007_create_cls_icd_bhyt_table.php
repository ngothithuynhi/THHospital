<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cls_icd_bhyt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cls')->constrained('can_lam_sangs')->onDelete('cascade');
            $table->foreignId('id_icd')->constrained('icds')->onDelete('cascade');
            $table->boolean('duoc_bhyt_chap_nhan')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cls_icd_bhyt');
    }
};
