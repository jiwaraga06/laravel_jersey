<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Liga;
use App\Models\Product;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    public function dashboard()
    {
        return view('Admin.page.dashboard');
    }
    public function jersey()
    {
        $product = Product::all();
        return view('Admin.page.products.jersey', [
            'product' => $product
        ]);
    }
    public function addJersey()
    {
        $liga = Liga::all();
        return view('Admin.page.products.addJersey',[
            'liga' => $liga
        ]);
    }
    public function editJersey($id)
    {
        $product = Product::where('id', $id)->first();
        $liga = Liga::all();
        // dd($product);
        return view('Admin.page.products.editJersey',[
            'product' => $product,
            'liga' => $liga
        ] );
    }
    public function liga()
    {
        $liga = Liga::all();
        return view('Admin.page.products.liga', [
            'liga' => $liga
        ]);
    }
    public function addLiga()
    {
        return view('Admin.page.products.addLiga');
    }
}
