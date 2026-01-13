<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClsIcdBhyt extends Pivot
{
    protected $table = 'cls_icd_bhyt';

    public $timestamps = false;

    protected $fillable = [
        'id_cls',
        'id_icd',
        'duoc_bhyt_chap_nhan',
    ];
}
