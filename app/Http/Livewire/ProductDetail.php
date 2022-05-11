<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $nama, $jumlah_pesanan, $nomor;
    public $tester;
    public function mount($id)
    {
        # code...
        $productDetail = Product::find($id);
        if ($productDetail) {
            $this->product = $productDetail;
        }
        $this->tester = "Ini tester dari controller";
    }
    public function masukanKeranjang()
    {
        # code...
        dd('Masuk');
    }
    public function render()
    {
        return view('livewire.product-detail');
    }
}
