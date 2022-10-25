<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VerifEmail;
use App\Models\Liga;
use App\Models\PesananDetails;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControllerAdmin extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
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
        return view('Admin.page.products.addJersey', [
            'liga' => $liga
        ]);
    }
    public function editJersey($id)
    {
        $product = Product::where('id', $id)->first();
        $liga = Liga::all();
        // dd($product);
        return view('Admin.page.products.editJersey', [
            'product' => $product,
            'liga' => $liga
        ]);
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
    public function viewAccount()
    {
        $user = User::all();
        return view('Admin.page.user.user', [
            'user' => $user
        ]);
    }
    public function viewPesananDetails()
    {
        $pesananDetails = PesananDetails::all();
        return view('Admin.page.pesanan.pesananDetails', [
            'pesananDetails' => $pesananDetails,
        ]);
    }

    public function sendEmail()
    {
        $body = [
            'name' => 'Raga',
            'body' => 'Testing'
        ];
        Mail::to('putraraga959@gmail.com')->send(new VerifEmail($body));
        dd('email dikirim');
    }
}
