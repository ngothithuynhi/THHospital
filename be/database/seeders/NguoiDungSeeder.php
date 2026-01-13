<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nguoi_dungs')->insert([
            [
                'ho_ten'        => 'Đường Đỗ Hồng Minh',
                'email'         => 'hongminh070899@gmail.com',
                'password_hash' => Hash::make('admin123'),
                'vai_tro'       => 'quan_tri',
                'trang_thai'    => 'hoat_dong',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'ho_ten'        => 'Nguyễn Văn A',
                'email'         => 'nguyenvana@gmail.com',
                'password_hash' => Hash::make('bacsi123'),
                'vai_tro'       => 'bac_si',
                'trang_thai'    => 'hoat_dong',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
