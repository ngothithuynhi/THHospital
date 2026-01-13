<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanLamSangSeeder extends Seeder
{
    public function run(): void
    {
        $loaiId = DB::table('loai_cls')->where('ten_loai', 'Huyết học')->value('id');

        if ($loaiId) {
            $clsId = DB::table('can_lam_sangs')->insertGetId([
                'ten_cls' => 'Công thức máu toàn bộ',
                'id_loai_cls' => $loaiId,
                'chi_phi_cao' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $icdId = DB::table('icds')->first()->id;
            if ($icdId) {
                DB::table('cls_icd_bhyt')->insert([
                    'id_cls' => $clsId,
                    'id_icd' => $icdId,
                    'duoc_bhyt_chap_nhan' => true,
                ]);
            }
        }
    }
}
