<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('thuocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_thuoc');
            $table->enum('trang_thai', ['duoc_phep', 'ngung'])->default('duoc_phep');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thuocs');
    }
};
