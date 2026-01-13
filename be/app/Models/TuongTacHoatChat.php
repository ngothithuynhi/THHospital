<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TuongTacHoatChat extends Model
{
    use HasFactory;

    protected $table = 'tuong_tac_hoat_chat';
    public $timestamps = false;

    protected $fillable = [
        'id_hoat_chat_1',
        'id_hoat_chat_2',
        'muc_do',
        'mo_ta',
        'xu_tri_goi_y',
    ];

    public function hoatChat1(): BelongsTo
    {
        return $this->belongsTo(HoatChat::class, 'id_hoat_chat_1');
    }

    public function hoatChat2(): BelongsTo
    {
        return $this->belongsTo(HoatChat::class, 'id_hoat_chat_2');
    }
}
