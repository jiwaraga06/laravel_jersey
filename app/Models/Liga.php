<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        # code...
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }
}
