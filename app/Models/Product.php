<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['nama','gambar'];

    public function liga()
    {
        # code...
        return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }
    public function product()
    {
        # code...
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
