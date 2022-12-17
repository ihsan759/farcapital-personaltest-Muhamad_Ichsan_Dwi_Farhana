<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatUser extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'id_riwayat', 'status'];

    protected $table = 'riwayat_user';

    public function riwayat_user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function riwayat()
    {
        return $this->belongsTo(RiwayatUser::class, 'id_riwayat');
    }
}
