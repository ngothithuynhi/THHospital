<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loai_cls', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai');
            $table->text('mo_ta')->nullable();
            $table->enum('trang_thai', ['su_dung', 'ngung'])->default('su_dung');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loai_cls');
    }
};
