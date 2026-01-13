<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiClsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loai_cls')->insert([
            ['ten_loai' => 'Huyết học', 'trang_thai' => 'su_dung'],
            ['ten_loai' => 'Sinh hóa', 'trang_thai' => 'su_dung'],
            ['ten_loai' => 'Chẩn đoán hình ảnh', 'trang_thai' => 'su_dung'],
        ]);
    }
}
