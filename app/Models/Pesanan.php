<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pemesanan',
        'status',
        'total_harga',
        'kode_unik',
        'user_id'
    ];
    public function pesananDetails()
    {
        # code...
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
