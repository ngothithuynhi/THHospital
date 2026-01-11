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
}
