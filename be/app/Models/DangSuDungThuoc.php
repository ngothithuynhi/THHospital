<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DangSuDungThuoc extends Model
{
    use HasFactory;

    protected $table = 'dang_su_dung_thuoc';

    protected $fillable = [
        'id_thuoc',
        'id_duong_dung',
        'dang_bao_che',
        'cach_pha_che',
        'ghi_chu',
        'trang_thai',
    ];

    public function thuoc(): BelongsTo
    {
        return $this->belongsTo(Thuoc::class, 'id_thuoc');
    }

    public function duongDung(): BelongsTo
    {
        return $this->belongsTo(DuongDung::class, 'id_duong_dung');
    }
}
