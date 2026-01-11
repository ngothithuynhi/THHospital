<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dungs';

    protected $fillable = [
        'ho_ten',
        'email',
        'password_hash',
        'vai_tro',
        'trang_thai',
        'avatar',
        'hash_reset',
        'hash_active',
    ];
}
