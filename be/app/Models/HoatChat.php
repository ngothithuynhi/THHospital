<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoatChat extends Model
{
    protected $table = 'hoat_chats';

    protected $fillable = [
        'ten_hoat_chat',
        'ghi_chu',
        'trang_thai',
    ];
}
