<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD extends Model
{
    protected $table = 'icds';

    protected $fillable = [
        'ma_icd',
        'ten_icd',
        'mo_ta',
        'loai',
    ];
    public function hoatChats()
    {
        return $this->belongsToMany(HoatChat::class, 'hoat_chat_icd_bhyt', 'id_icd', 'id_hoat_chat')
            ->withPivot('duoc_bhyt_chap_nhan');
    }

    public function canLamSangs()
    {
        return $this->belongsToMany(CanLamSang::class, 'cls_icd_bhyt', 'id_icd', 'id_cls')
            ->withPivot('duoc_bhyt_chap_nhan');
    }
}
