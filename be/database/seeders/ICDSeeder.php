<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IcdSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('icds')->insert([
            [
                'ma_icd' => 'I10',
                'ten_icd' => 'Tăng huyết áp nguyên phát',
                'mo_ta' => 'Tăng huyết áp không rõ nguyên nhân',
                'loai' => 'chinh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_icd' => 'E11',
                'ten_icd' => 'Đái tháo đường typ 2',
                'mo_ta' => 'Đái tháo đường không phụ thuộc insulin',
                'loai' => 'chinh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_icd' => 'J18',
                'ten_icd' => 'Viêm phổi không xác định',
                'mo_ta' => null,
                'loai' => 'chinh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_icd' => 'E78.5',
                'ten_icd' => 'Rối loạn lipid máu',
                'mo_ta' => null,
                'loai' => 'phu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_icd' => 'K21',
                'ten_icd' => 'Trào ngược dạ dày – thực quản',
                'mo_ta' => null,
                'loai' => 'phu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
