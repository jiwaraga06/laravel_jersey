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
            'nama' => 'required',
            'harga' => 'required',
            'liga_id' => 'required',
            'gambar' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'gambar.required' => 'Gambar tidak boleh kosong',
        ]);
        $image = $request->file('gambar');
        // $image->move(public_path('assets/jersey'), $image->hashName());
        // http://192.168.50.6:8000/storage/assets/jersey/yDL9pzfScbnCXkjfkQg61rnPeQUK5DxZFRXxithK.png
        $image->store('assets/jersey');
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'liga_id' => $request->liga_id,
            'is_ready' => $request->is_ready,
            'gambar' => $image->hashName()
        ]);
        return redirect('/product/jersey')->with('Success', 'Product Success Added !');
        // dd('bisa');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'liga_id' => 'required',
            'gambar' => 'required',
        ]);
        $image = $request->file('gambar');
        // $image->move(public_path('assets/jersey'), $image->hashName());
        // http://192.168.50.6:8000/storage/assets/jersey/yDL9pzfScbnCXkjfkQg61rnPeQUK5DxZFRXxithK.png
        $image->store('assets/jersey');
        Product::where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'liga_id' => $request->liga_id,
            'is_ready' => $request->is_ready,
            'gambar' => $image->hashName()
        ]);
        // dd('bisa update', [
        //     'id' => $id,
        //     'nama' => $request->nama,
        //     'harga' => $request->harga,
        //     'liga_id' => $request->liga_id,
        //     'gambar' => $image->hashName()
        // ]);
    }

    public function delete($id){
        $product = Product::where('id', $id);
        $product->delete();
        return redirect('/producy/jersey');
    }

}
