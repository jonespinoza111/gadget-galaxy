<?php

namespace App\Livewire\Frontend\Checkout;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;
use Session;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount;

    public $fullname, $email, $phone, $pincode, $address, $city, $payment_method = NULL, $payment_id = NULL;

    public function rules() {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:5|min:5',
            'address' => 'required|string|max:500',
            'city'=> 'required|string'
        ];
    }

    #[On('validationForAll')] 
    public function validationForAll() {
        $this->validate();
    }

    #[On('transactionEmit')] 
    public function paidOnlineOrder($value) {
        $this->payment_id = $value;
        $this->payment_method = 'Paid By Paypal';

        $process = $this->placeOrder();
        if ($process) {
            Cart::where('user_id', Session::get('user')['id'])->delete();
            try {
                $order = Order::findOrFail($process->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            } catch(\Exception $e) {

            }
            session()->flash('message', 'Order Placed Successfully');
            return redirect()->to('thank-you');
        } else {
            session()->flash('message', 'Something Went Wrong!');
        }
    }

    public function placeOrder() {
        $this->validate();
        $order = Order::create([
            'user_id' => Session::get('user')['id'],
            'tracking_no' => 'funda-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_method' => $this->payment_method,
            'payment_id' => $this->payment_id
        ]);


        foreach ($this->carts as $cartItem) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            } else {
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }

            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity; 
        }

        return $order;
    }

    public function processOrder() {
        $this->payment_method = 'Cash on Delivery';
        $process = $this->placeOrder();
        if ($process) {
            Cart::where('user_id', Session::get('user')['id'])->delete();
            try {
                $order = Order::findOrFail($process->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            } catch(\Exception $e) {

            }
            session()->flash('message', 'Order Placed Successfully');
            return redirect()->to('thank-you');
        } else {
            session()->flash('message', 'Something Went Wrong!');
        }
    }

    public function totalProductAmount() {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', Session::get('user')['id'])->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity; 
        }

        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount,
            'cartProducts' => $this->carts
        ]);
    }
}
