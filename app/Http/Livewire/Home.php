<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $home;
    public function render()
    {
        return view('livewire.home', [
            'products' => Product::take(4)->get(),
            'liga' => Liga::all()
        ]);
    }
}
