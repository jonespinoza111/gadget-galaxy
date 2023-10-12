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
                    {{-- <div id="paypal-button-container"></div> --}}
                </div>
            </div>
            <button class="w-[200px] p-3 bg-green-200" type="submit">Order Now</button>
        </form>
    </div>
</div>
@endsection

{{-- @push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AaVLrE8lOQkmhcJbgXsNinoviCGQXR-66HG2ypbZzhrEri5WwyvZ9Fw51CfHpNiWOEUAaXVo9joRSZ0X&currency=USD"></script>
    <script>
        window.paypal
        .Buttons({
            async createOrder() {
            try {
                const response = await fetch("/api/orders", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                // use the "body" param to optionally pass additional order information
                // like product ids and quantities
                body: JSON.stringify({
                    cart: [
                    {
                        id: "YOUR_PRODUCT_ID",
                        quantity: "YOUR_PRODUCT_QUANTITY",
                    },
                    ],
                }),
                });
                
                const orderData = await response.json();
                
                if (orderData.id) {
                return orderData.id;
                } else {
                const errorDetail = orderData?.details?.[0];
                const errorMessage = errorDetail
                    ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
                    : JSON.stringify(orderData);
                
                throw new Error(errorMessage);
                }
            } catch (error) {
                console.error(error);
                resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
            }
            },
            async onApprove(data, actions) {
            try {
                const response = await fetch(`/api/orders/${data.orderID}/capture`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                });
                
                const orderData = await response.json();
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you message
                
                const errorDetail = orderData?.details?.[0];
                
                if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
                return actions.restart();
                } else if (errorDetail) {
                // (2) Other non-recoverable errors -> Show a failure message
                throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
                } else if (!orderData.purchase_units) {
                throw new Error(JSON.stringify(orderData));
                } else {
                // (3) Successful transaction -> Show confirmation or thank you message
                // Or go to another URL:  actions.redirect('thank_you.html');
                const transaction =
                    orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                    orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                resultMessage(
                    `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
                );
                console.log(
                    "Capture result",
                    orderData,
                    JSON.stringify(orderData, null, 2),
                );
                }
            } catch (error) {
                console.error(error);
                resultMessage(
                `Sorry, your transaction could not be processed...<br><br>${error}`,
                );
            }
            },
        })
        .render("#paypal-button-container");
        
        // Example function to show a result to the user. Your site's UI library can be used instead.
        function resultMessage(message) {
        const container = document.querySelector("#result-message");
        container.innerHTML = message;
        }
    </script>

@endpush --}}
