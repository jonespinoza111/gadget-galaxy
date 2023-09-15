<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Session;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = ['CartAddedUpdated' => 'checkCartCount'];

    public function checkCartCount() {
        if (Session::get('user')) {
            return $this->cartCount = Cart::where('user_id', Session::get('user')['id'])->count();
        } else {
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
