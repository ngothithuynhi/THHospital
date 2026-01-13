<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DangSuDungThuocSeeder extends Seeder
{
    public function run(): void
    {
        $thuocId = DB::table('thuocs')->first()->id;
        $duongDungId = DB::table('duong_dungs')->where('ten_duong_dung', 'Uống')->value('id');

        if ($thuocId && $duongDungId) {
            DB::table('dang_su_dung_thuoc')->insert([
                'id_thuoc' => $thuocId,
                'id_duong_dung' => $duongDungId,
                'dang_bao_che' => 'Viên nén',
                'trang_thai' => 'su_dung',
            ]);
        }
    }
}
