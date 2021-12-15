<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/checkout/cart.css')}}">
    @include('bootstrap')
    <title>Order Now</title>
</head>
<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth
<div class="cart-title container">
    Order Now
</div>
<section class="container">
    <div class="row">
        <div class="col-8">
            @php
                $sumTotal = 0;

            @endphp
            <div class="d-flex card-item">
                <img src="{{Storage::url($data[0]->image)}}" width="122px" height="122px"
                     style="border-radius: 16px">
                <div style="justify-content: space-between">
                    <div>
                        <h6>NYChop</h6>
                        <h3>{{$data[0]->name}}</h3>
                        <h5>@currency($data[0]->price)</h5>
                    </div>
                    <br>
                    <div class="d-flex">
                        <form class="d-flex form" style="align-items: end" id="form-quantity">
                            @csrf
                            <div
                                style="font-size: 1.4rem; padding-right: 2em">
                                <label style="margin: 0">Quantity</label>
                                <input id="input-qty" name="input-qty" style="text-align: right; width: 2vw"
                                       type="number" value="1" onchange="updateQty(this.value)" class="input-form"
                                       min="1">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="checkout-area">
                <span>Checkout summary</span>
                <div class="d-flex row checkout-details">
                    <span id="quantity-span" class="flex-shrink-1 col">Total price (1 item)</span>
                    <span id="subTotalPrice" class="col">@currency($data[0]->price)</span>
                </div>
                <form action="/checkout-now" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="productId" value="{{$data[0]->id}}">
                    <input type="hidden" name="product_price" id="productPrice" value="{{$data[0]->price}}">
                    <input type="hidden" name="product_quantity" id="productQuantity"  value="1">
                    <input type="hidden" name="total_price" id="totalPrice" value="{{$data[0]->price}}">
                    <button id="btnOrderNow" class="btnOrderCart">Order @currency($data[0]->price)</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    function updateQty(value) {
        var qtySpan = document.getElementById('quantity-span');
        var price = document.getElementById('productPrice').value;
        var btnOrderNow = document.getElementById('btnOrderNow');
        var subTotalPrice = document.getElementById('subTotalPrice');
        var totalPrice = parseInt(price) * parseInt(value);
        var productQuantity = document.getElementById('productQuantity');
        productQuantity.value = parseInt(value);

        var hiddenTotalPrice = document.getElementById('totalPrice');
        hiddenTotalPrice.value = totalPrice;

        if (value <= 1) {
            qtySpan.innerHTML = "Total price (" + value + " item)";
        } else {
            qtySpan.innerHTML = "Total price (" + value + " items)";
        }

        btnOrderNow.innerText = "Order Rp " + totalPrice;
        subTotalPrice.innerText = "Rp " + totalPrice;
    }
</script>
</html>
