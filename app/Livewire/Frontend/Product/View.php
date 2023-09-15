<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;
use Session;

class View extends Component
{
    public $category, $product, $productColorQuantity, $quantityCount = 1, $productColorId; 

    public function colorSelected($productColorId)  {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorQuantity = $productColor->quantity;

        if ($this->productColorQuantity == 0) {
            $this->productColorQuantity = 'outOfStock';
        }
    }

    public function addToWishList($product_id) {
        if (Session::get('user')) {
            if (WishList::where('user_id', Session::get('user')['id'])->where('product_id', $product_id)->exists()) {
                session()->flash('message', 'Already added to wishlist.');
                return false;
            } else {
                WishList::create([
                    'user_id' => Session::get('user')['id'],
                    'product_id' => $product_id,
                ]);
                session()->flash('message', 'Added to wishlist.');
            }
        } else {
            session()->flash('message', 'Please login to continue.');
            return false;
        }

    }

    public function decrementQuantity() {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function incrementQuantity() {
        if ($this->quantityCount < 10)  {
            $this->quantityCount++;
        }
    }

    public function addToCart(int $productId) {
        if (Session::get('user')) {
            if ($this->product->where('id',$productId)->where('status','0')->exists()) {
                if ($this->product->productColors()->count() > 1) {
                    if ($this->productColorQuantity != NULL) {

                        if (Cart::where('user_id',Session::get('user')['id'])
                                ->where('product_id', $productId)
                                ->where('product_color_id',$this->productColorId)
                                ->exists()) {
                            session()->flash('message','Product Already Added');
                        } else {
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
    
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => Session::get('user')['id'],
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    session()->flash('message','Product Successfully Added to Cart');
                                } else {
                                    session()->flash('message','Only '.$productColor->quantity.' Quantity of Color Available');
                                }
                            }
                        }

                    }
                } else {

                    if (Cart::where('user_id',Session::get('user')['id'])
                                ->where('product_id', $productId)
                                ->where('product_color_id',$this->productColorId)
                                ->exists()) {

                            session()->flash('message','Product Already Added');
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCount) {
                                Cart::create([
                                    'user_id' => Session::get('user')['id'],
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message','Product Successfully Added to Cart');
                            } else {
                                session()->flash('message','Only '.$this->product->quantity.' Quantity Available');
                            }
                        }
                    }
                }
            } else {

            }
        } else {
            session()->flash('message','Login before adding to cart');
        }
    }

    public function mount($category, $product) {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
