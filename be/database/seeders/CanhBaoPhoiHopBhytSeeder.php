<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanhBaoPhoiHopBhytSeeder extends Seeder
{
    public function run(): void
    {
        $paraId = DB::table('hoat_chats')->where('ten_hoat_chat', 'Paracetamol')->value('id');
        $aspiId = DB::table('hoat_chats')->where('ten_hoat_chat', 'Aspirin')->value('id');
        $icdId = DB::table('icds')->first()->id;

        if ($paraId && $aspiId) {
            DB::table('canh_bao_phoi_hop_bhyt')->insert([
                'id_hoat_chat_1' => $paraId,
                'id_hoat_chat_2' => $aspiId,
                'id_icd' => $icdId,
                'muc_do' => 'can_can_nhac',
                'ly_do' => 'Cảnh báo của BHYT',
                'ghi_chu' => 'Lưu ý khi kê đơn',
            ]);
        }
    }
}
