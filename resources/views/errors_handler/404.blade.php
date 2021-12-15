<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile/profile.css')}}">
    @include('bootstrap')
    <title>404 | Page Not Found</title>
</head>
<div style="text-align: center; margin-top: 100px ; max-height: 100vh" >
    <img src="{{URL::asset('asset/Illustrations/error_404.svg')}}" height="512px">
    <div style="margin: 64px 0">
        <div class="container" style="padding: 0 300px">
            <span style="font-size: 1.6rem">
                Oops, the page your looking for is still unavailable. But don't worry we will redirect to the right way
            </span>
        </div>
        <div style="margin: 24px">
            <form action="/marketpage">
                <button class="btnMarket">
                    Go to Marketpage
                </button>
            </form>
        </div>
    </div>
</div>
<style>
    .btnMarket, .btnMarket:hover, .btnMarket:focus {
        padding: 10px;
        background-color: var(--primary_green);
        color: white;
        font-weight: normal;
        border-radius: 8px;
        text-decoration: none;
        border: transparent;
        font-size: 1.4rem;
        outline: transparent;
        cursor: pointer;
    }
</style>

