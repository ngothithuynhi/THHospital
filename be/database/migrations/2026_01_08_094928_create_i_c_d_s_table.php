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
        Schema::create('icds', function (Blueprint $table) {
            $table->id();
            $table->string('ma_icd')->unique();
            $table->string('ten_icd');
            $table->text('mo_ta')->nullable();
            $table->enum('loai', ['chinh', 'phu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_c_d_s');
    }
};
