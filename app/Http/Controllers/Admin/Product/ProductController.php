<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $image = $request->file('gambar');
        // $image->move(public_path('assets/jersey'), $image->hashName());
        // http://192.168.50.6:8000/storage/assets/jersey/yDL9pzfScbnCXkjfkQg61rnPeQUK5DxZFRXxithK.png
        $image->store('assets/jersey');
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            // 'gambar' => $request->file('gambar')->store('postImg')
            'gambar' => $image->hashName()
        ]);
        dd('bisa');
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $image = $request->file('gambar');
        // $image->move(public_path('assets/jersey'), $image->hashName());
        // http://192.168.50.6:8000/storage/assets/jersey/yDL9pzfScbnCXkjfkQg61rnPeQUK5DxZFRXxithK.png
        $image->store('assets/jersey');
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            // 'gambar' => $request->file('gambar')->store('postImg')
            'gambar' => $image->hashName()
        ]);
        dd('bisa update');
    }

}
