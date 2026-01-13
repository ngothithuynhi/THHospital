<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DuongDung extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_duong_dung',
        'mo_ta',
        'trang_thai',
    ];

    public function dangSuDungThuocs(): HasMany
    {
        return $this->hasMany(DangSuDungThuoc::class, 'id_duong_dung');
    }
}
