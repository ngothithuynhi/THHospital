<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HoatChatIcdBhyt extends Pivot
{
    protected $table = 'hoat_chat_icd_bhyt';

    public $timestamps = false;

    protected $fillable = [
        'id_hoat_chat',
        'id_icd',
        'duoc_bhyt_chap_nhan',
    ];
}
