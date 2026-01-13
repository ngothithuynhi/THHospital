<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ThuocHoatChat extends Pivot
{
    protected $table = 'thuoc_hoat_chat';

    public $timestamps = false;

    protected $fillable = [
        'id_thuoc',
        'id_hoat_chat',
        'vai_tro',
        'ham_luong',
    ];
}
