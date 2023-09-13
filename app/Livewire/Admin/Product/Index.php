<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\ShopProduct;

class Index extends Component
{
    public function render()
    {
        $products = ShopProduct::all();
        return view('livewire.admin.product.index', compact('products'));
    }
}
