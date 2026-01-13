<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuocSeeder extends Seeder
{
    public function run(): void
    {
        $thuocId = DB::table('thuocs')->insertGetId([
            'ten_thuoc' => 'Panadol Extra',
            'trang_thai' => 'duoc_phep',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $paracetamolId = DB::table('hoat_chats')->where('ten_hoat_chat', 'Paracetamol')->value('id');

        if ($paracetamolId) {
            DB::table('thuoc_hoat_chat')->insert([
                'id_thuoc' => $thuocId,
                'id_hoat_chat' => $paracetamolId,
                'vai_tro' => 'chinh',
                'ham_luong' => '500mg',
            ]);
        }
    }
}
