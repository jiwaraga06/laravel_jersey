<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah_pesanan',
        'total_harga',
        'nameset',
        'nama',
        'nomor',
        'product_id',
        'pesanan_id',
        'user_id',
    ];
    public function product()
    {
        # code...
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
