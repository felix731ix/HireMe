<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/product_details/product_details.css')}}">

    @include('bootstrap')
    <title>{{$products_details->name}}</title>
</head>

<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth
<section>
    <div class="row m-0" style="padding: 88px 170px">
        <div class="col-3">
            <img src="{{Storage::url($products_details->image)}}" width="100%" height="300px"
                 style="border-radius: 16px; object-fit: cover">
        </div>
        <div class="col-6">
            <h1>{{$products_details->name}}</h1>
            <div class="flex-wrap" style="font-size: 1.6rem; margin-top: 1em">
                    <span
                        style="padding: 0.2em 0; border-bottom: solid 1px var(--primary_green);font-weight: 600; color: var(--primary_green)">Description</span>
                <p style="margin-top: 1em; line-height: 1.5; font-size: 1.6rem">
                    {{$products_details->description}}
                </p>
            </div>
        </div>
        <div class="col-3">
            @auth
                @if(auth()->user()->id != $products_details->user_id)
                    <div style="padding: 20px 25px; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.15);border-radius:8px">
                        <form action="/order-now/{{$products_details->id}}" action="GET">
                            <button type="submit" class="order-item">
                                Order @currency($products_details->price)
                            </button>
                        </form>
                        <form action="/item" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$products_details->id}}" name="id">
                            <button type="submit" class="add-to-cart align-items-center d-flex justify-content-center"
                                    name="add-to-cart">
                            <span class="iconify" style="font-size: 2.4rem; margin: 0 0.2em; display: inline-block"
                                  data-icon="la:cart-plus"></span>
                                <div>
                                    Add to Cart
                                </div>
                            </button>
                        </form>
                    </div>
                @endif
            @else
                <form action="/user-login"
                      style="padding: 20px 25px; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.15);border-radius:8px"
                      method="GET" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$products_details->id}}">
                    <button type="submit" class="order-item">Order @currency($products_details->price)</button>
                    <button type="submit" class="add-to-cart align-items-center d-flex justify-content-center">
                        <span class="iconify" style="font-size: 2.4rem; margin: 0 0.2em; display: inline-block"
                              data-icon="la:cart-plus"></span>
                        <div>
                            Add to Cart
                        </div>
                    </button>
                </form>
            @endauth
        </div>
    </div>
    @if(session()->has('added'))
        <div id="snackbar">{{session('added')}}</div>
    @endif
</section>
</body>
<script>
    @if(session()->has('added'))
    $(document).ready(function () {
        var x = document.getElementById("snackbar");
        // window.alert(x.className);
        x.className = "show"
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    });
    @php
        session()->forget('added');
    @endphp
    @endif

</script>

</html>
