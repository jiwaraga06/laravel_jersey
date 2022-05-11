<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLiga extends Component
{
    use WithPagination;
    public $search, $liga;

    protected $queryString = ['search'];

    public function mount($ligaid)
    {
        # code...
        $ligaDetail = Liga::find($ligaid);
        if ($ligaDetail) {
            $this->liga = $ligaDetail;
        }
    }

    public function render()
    {
        // if($this->search){
        //     $product = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        // } else {
        // }
        $product = Product::where('liga_id', $this->liga->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.product-index', [
            'product' => $product,
            'title' => 'Jersey '.$this->liga->nama
        ]);
    }
}
