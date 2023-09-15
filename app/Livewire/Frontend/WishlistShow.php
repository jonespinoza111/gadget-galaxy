<?php

namespace App\Livewire\Frontend;

use App\Models\WishList;
use Livewire\Component;
use Session;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId) {
        Wishlist::where('user_id',Session::get('user')['id'])->where('id',$wishlistId)->first();
        session()->flash('message', 'Wishlist Item Removed Successfully');
    }
    public function render()
    {
        $wishlist = WishList::where('user_id', Session::get('user')['id'])->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
