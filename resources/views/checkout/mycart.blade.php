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
    <title>My Cart</title>
</head>
<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth
<div class="cart-title container">
    My Cart
</div>
@if(count($carts) < 1)
    <section class="container" style="text-align: center">
        <img src="{{URL::asset('asset/Illustrations/empty_cart.svg')}}" width="364px" height="364px">
        <div>
            <h5 style="font-weight: normal!important; font-style: italic; font-size: 1.4rem !important;line-height: 1.5;margin: 1em 0; padding: 0 35%">Looks still empty here, let's fill it with your favorite products shall we</h5>
            <form ACTION="/marketpage">
                <button class="btnMarket">Explore marketplace</button>
            </form>
        </div>
    </section>
@else
<section class="container">
    <div class="row">
        <div class="col-8">
            @php
            $sumTotal = 0;
            @endphp
            @for($i=0;$i<count($carts);$i++)
                <div class="d-flex card-item">
                    <img src="{{Storage::url($carts[$i]->products->image)}}" width="122px" height="122px"
                         style="border-radius: 16px">
                    <div style="justify-content: space-between">
                        <div>
                            <h6>NYChop</h6>
                            <h3>{{$carts[$i]->products->name}}</h3>
                            <h5>@currency($carts[$i]->products->price)</h5>
                        </div>
                        <br>
                        <div class="d-flex">
                            <div  class="d-flex form" style="align-items: end">
                                <div style="font-size: 1.4rem; border-right: solid 1px var(--gray_3); padding-right: 2em">
                                    <label style="margin: 0">Quantity</label>
                                    <input id="input-qty" price={{$carts[$i]->products->price}} product-id={{$carts[$i]->products->id}} name="inputQty" style="text-align: right; width: 2vw" type="number" onchange="updateQty(this)" class="input-form input-qty" min="1" value="{{$carts[$i]->quantity}}">
                                </div>
                            </div>
                            <div class="icon">
                                <form action="/remove/{{$carts[$i]->id}}" method="POST">
                                    @csrf
                                    {{method_field('delete')}}
                                    <button style="border: transparent;cursor:pointer;outline: none; background-color: transparent">
                                        <span class="iconify align-middle" style="font-size: 2.0rem; color: var(--red)" data-icon="ri:delete-bin-7-line"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @php
                        $sumTotal = $sumTotal + ($carts[$i]->quantity * $carts[$i]->products->price);
                        @endphp
                    </div>
                </div>
            @endfor
        </div>
        <div class="col">
            <div class="checkout-area">
                <span>Checkout summary</span>
                <div class="d-flex row checkout-details">
                    <span class="flex-shrink-1 col">Total price(<span id="quantity-summary">{{$quantity}}</span> items)</span>
                    <span class="col" id="sum-total">@currency($sumTotal)</span>
                </div>
                <form action="/checkout">
                    <button class="btnOrderCart">Order <span id="sum-total-btn">@currency($sumTotal)</span></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endif
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    function updateQty(element){
        var productId = $(element).attr("product-id");
        var qtyVal = $(element).val();
        var totalItem = 0, totalPrice = 0;
        $.ajax({
            url: "/updateProduct",
            method: "POST",
            data: {
                'id': productId,
                'qty': qtyVal,
                '_token': "{{ csrf_token() }}",
                '_method' : "PUT"
            },
            error: function(e) {
                // alert('Error dalam checkout cart');
            },
            success:function (e){
                $('.input-qty').each(function (){
                    var rowQty  = $(this).val();
                    var rowPrice = $(this).attr('price');
                    totalItem += parseInt(rowQty);
                    totalPrice += parseInt(rowQty) * rowPrice;
                });

                var totalPriceConverted = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0, maximumFractionDigits: 0, }).format(totalPrice);
                document.getElementById('quantity-summary').innerHTML = totalItem;
                document.getElementById('sum-total').innerHTML = totalPriceConverted
                document.getElementById('sum-total-btn').innerHTML = totalPriceConverted;
                },
            complete : function(e) {
            }
        })
    }
</script>
</html>
