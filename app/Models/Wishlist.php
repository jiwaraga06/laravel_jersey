<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'harga_nameset',
        'is_ready',
        'jenis',
        'berat',
        'gambar',
        'liga_id',
        'is_favorite',
        'user_id',
        'product_id',
    ];
    public function product()
    {
        # code...
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    public function liga()
    {
        # code...
        return $this->hasMany(Liga::class, 'liga_id', 'id');
    }
    public function user()
    {
        # code...
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
