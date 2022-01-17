<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/payment/payment.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/checkout/cart.css')}}">
    @include('bootstrap')
    <title>Success</title>
</head>
<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth
<section class="container" style="text-align: center">
    <img src="{{URL::asset('asset/Illustrations/well_done.svg')}}" width="364px" height="364px">
    <div>
        <h5 style="font-weight: normal!important; font-style: italic; font-size: 1.4rem !important;line-height: 1.8;margin: 1em 0; padding: 0 35%">Payment Successful, Thank you</h5>
        <form ACTION="/marketpage">
            <button class="btnMarket">Explore marketplace</button>
        </form>
    </div>
</section>
</body>
</html>
