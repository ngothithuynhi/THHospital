<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('can_lam_sangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_cls');
            $table->foreignId('id_loai_cls')->constrained('loai_cls')->onDelete('cascade');
            $table->boolean('chi_phi_cao')->default(false);
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('can_lam_sangs');
    }
};
