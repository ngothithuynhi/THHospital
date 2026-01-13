<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TuongTacHoatChatSeeder extends Seeder
{
    public function run(): void
    {
        $paraId = DB::table('hoat_chats')->where('ten_hoat_chat', 'Paracetamol')->value('id');
        $aspiId = DB::table('hoat_chats')->where('ten_hoat_chat', 'Aspirin')->value('id');

        if ($paraId && $aspiId) {
            DB::table('tuong_tac_hoat_chat')->insert([
                'id_hoat_chat_1' => $paraId,
                'id_hoat_chat_2' => $aspiId,
                'muc_do' => 'can_theo_doi',
                'mo_ta' => 'Tăng nguy cơ chảy máu',
                'xu_tri_goi_y' => 'Theo dõi các dấu hiệu chảy máu',
            ]);
        }
    }
}
