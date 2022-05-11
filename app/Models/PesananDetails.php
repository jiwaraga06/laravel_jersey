<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah_pesanan',
        'total_harga',
        'nameset',
        'nama',
        'gambar',
        'nama_product',
        'nomor',
        'product_id',
        'pesanan_id'
    ];
    public function pesanan()
    {
        # code...
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
