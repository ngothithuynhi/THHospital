<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuongDungSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('duong_dungs')->insert([
            ['ten_duong_dung' => 'Uống', 'mo_ta' => 'Đường uống thông thường', 'trang_thai' => 'su_dung'],
            ['ten_duong_dung' => 'Tiêm tĩnh mạch', 'mo_ta' => 'Tiêm vào tĩnh mạch', 'trang_thai' => 'su_dung'],
        ]);
    }
}
