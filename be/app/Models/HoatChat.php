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
    public function thuocs()
    {
        return $this->belongsToMany(Thuoc::class, 'thuoc_hoat_chat', 'id_hoat_chat', 'id_thuoc')
            ->withPivot('vai_tro', 'ham_luong');
    }

    public function icds()
    {
        return $this->belongsToMany(ICD::class, 'hoat_chat_icd_bhyt', 'id_hoat_chat', 'id_icd')
            ->withPivot('duoc_bhyt_chap_nhan');
    }
}
