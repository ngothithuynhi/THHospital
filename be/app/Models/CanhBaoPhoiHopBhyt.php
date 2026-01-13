<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CanhBaoPhoiHopBhyt extends Model
{
    use HasFactory;

    protected $table = 'canh_bao_phoi_hop_bhyt';
    public $timestamps = false;

    protected $fillable = [
        'id_hoat_chat_1',
        'id_hoat_chat_2',
        'id_icd',
        'muc_do',
        'ly_do',
        'ghi_chu',
    ];

    public function hoatChat1(): BelongsTo
    {
        return $this->belongsTo(HoatChat::class, 'id_hoat_chat_1');
    }

    public function hoatChat2(): BelongsTo
    {
        return $this->belongsTo(HoatChat::class, 'id_hoat_chat_2');
    }

    public function icd(): BelongsTo
    {
        return $this->belongsTo(ICD::class, 'id_icd');
    }
}
