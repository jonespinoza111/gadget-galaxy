<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Session;

class CartShow extends Component
{

    public $cart, $quantityCount, $totalPrice = 0;

    public function decrementQuantity(int $cartId) {
        $cartData = Cart::where('id',$cartId)->where('user_id', Session::get('user')['id'])->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id',$cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only '.$productColor->quantity.' Are Available');
                }
            } else { 
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only '.$cartData->product->quantity.' Are Available');
                }
            }
        }
    }

    public function incrementQuantity(int $cartId) {
        $cartData = Cart::where('id',$cartId)->where('user_id', Session::get('user')['id'])->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id',$cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only '.$productColor->quantity.' Are Available');
                }
            } else { 
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only '.$cartData->product->quantity.' Are Available');
                }
            }
        }
    }

    public function removeCartItem(int $cartId) {
        $cartRemoveData = Cart::where('user_id',Session::get('user')->id)->where('id',$cartId)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->dispatch('CartAddedUpdated');
            session()->flash('message','CartItem removed Successfully');
        } else {
            session()->flash('message','Something went wrong!');

        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', Session::get('user')->id)->get();

        return view('livewire.frontend.cart.cart-show', [
            'cartProducts' => $this->cart
        ]);
    }
}
