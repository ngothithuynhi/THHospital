<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoaiCls extends Model
{
    use HasFactory;

    protected $table = 'loai_cls';

    protected $fillable = [
        'ten_loai',
        'mo_ta',
        'trang_thai',
    ];

    public function canLamSangs(): HasMany
    {
        return $this->hasMany(CanLamSang::class, 'id_loai_cls');
    }
}
