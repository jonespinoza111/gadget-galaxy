@extends('main')
@section('content')
<div class="custom-product">
    <div class="mx-10 my-5">
        <table>
            <tbody>
                <tr class="flex flex-row justify-between gap-x-20 border-b-2 border-[#ccc]">
                    <td>Amount</td>
                    <td>$ {{$cartTotal}}</td>
                </tr>
                <tr class="flex flex-row justify-between gap-x-20 border-b-2 border-[#ccc]">
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr class="flex flex-row justify-between gap-x-20 border-b-2 border-[#ccc]">
                    <td>Delivery</td>
                    <td>$ 10</td>
                </tr>
                <tr class="flex flex-row justify-between gap-x-20 border-b-2 border-[#ccc]">
                    <td>Total Amount</td>
                    <td>$ {{$cartTotal+10}}</td>
                </tr>
            </tbody>
        </table>   
    </div>
    <div class="mx-10 my-5">
        <form class="flex flex-col gap-y-5" action="/placeorder" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="p-3" name="address" placeholder="Enter your address"></textarea>
            </div>
            <div class="form-group">
                <label class="font-bold">Payment Method</label>
                <div class="flex flex-col">
                    <div>
                        <input type="radio" value="cash" name="payment">
                        <span>Online Payment</span>
                    </div>
                    <div>
                        <input type="radio" value="cash" name="payment">
                        <span>EMI Payment</span>
                    </div>
                    <div>
                        <input type="radio" value="cash" name="payment">
                        <span>Payment on Delivery</span>
                    </div>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <button class="w-[200px] p-3 bg-green-200" type="submit">Order Now</button>
        </form>
    </div>
</div>
@endsection
