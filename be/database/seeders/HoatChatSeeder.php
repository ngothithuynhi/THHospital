<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HoatChat;

class HoatChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HoatChat::create([
            'ten_hoat_chat' => 'Paracetamol',
            'ghi_chu' => 'Giảm đau, hạ sốt',
            'trang_thai' => 'su_dung',
        ]);

        HoatChat::create([
            'ten_hoat_chat' => 'Ibuprofen',
            'ghi_chu' => 'Kháng viêm không steroid',
            'trang_thai' => 'su_dung',
        ]);

        HoatChat::create([
            'ten_hoat_chat' => 'Aspirin',
            'ghi_chu' => 'Chống kết tập tiểu cầu',
            'trang_thai' => 'ngung',
        ]);
    }
}
