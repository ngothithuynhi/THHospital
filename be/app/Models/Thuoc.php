<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thuoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_thuoc',
        'trang_thai',
    ];

    public function hoatChats(): BelongsToMany
    {
        return $this->belongsToMany(HoatChat::class, 'thuoc_hoat_chat', 'id_thuoc', 'id_hoat_chat')
            ->withPivot('vai_tro', 'ham_luong');
    }

    public function dangSuDungThuocs(): HasMany
    {
        return $this->hasMany(DangSuDungThuoc::class, 'id_thuoc');
    }
}
