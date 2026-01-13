<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CanLamSang extends Model
{
    use HasFactory;

    protected $table = 'can_lam_sangs';

    protected $fillable = [
        'ten_cls',
        'id_loai_cls',
        'chi_phi_cao',
        'mo_ta',
    ];

    public function loaiCls(): BelongsTo
    {
        return $this->belongsTo(LoaiCls::class, 'id_loai_cls');
    }

    public function icds(): BelongsToMany
    {
        return $this->belongsToMany(ICD::class, 'cls_icd_bhyt', 'id_cls', 'id_icd')
            ->withPivot('duoc_bhyt_chap_nhan');
    }
}
