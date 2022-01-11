<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    @include('bootstrap')
    <title>Marketpage</title>
</head>
<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth

<div class="search-results">
    @if(isset($_GET['query']))
        Search results for "{{$_GET['query']}}"
    @endif
</div>

<div class="market-type d-flex">
    <div class="active d-flex align-items-center" id="product">
        <span class="iconify" data-icon="ci:bulb"></span>
        <span>Products & Services</span>
    </div>

{{--    <div class="disable d-flex align-items-center" id="service" onclick="changeClass(this, this.id)">--}}
{{--        <span class="iconify" data-icon="octicon:package-24"></span>--}}
{{--        <span>Services</span>--}}
{{--    </div>--}}
</div>


<section class="row-cards">
    @php
        $counter = 0;
        $productCounter = 0;
        $remainingProduct = count($products);
    @endphp
    @for($j=0;$j<3;$j++)
        <div class="row mt-5">
            @for($i=$counter;$i<count($products); $i++)
                @if($productCounter <5)
                    <div class="cards col-md-auto">
                        <a href="/marketpage/{{$products[$i]->id}}">
                            <img src="{{Storage::url($products[$i]->image)}}" width="280px"
                                 height="270px" style="border-radius: 16px; object-fit: cover; align-items: center">
                        </a>
                        <div class="cards-details">
                            <div class="d-flex justify-content-between cards-details">
                                <div class="flex-shrink-1">{{$products[$i]->name}}</div>
                                <div class="w-50 text-right">@currency($products[$i]->price)</div>
                            </div>
                            <div>
                                <span>{{ $products[$i]->user->username }}</span>
                            </div>
                        </div>
                    </div>
                    @php
                        $counter++;
                        $productCounter++;
                    @endphp
                @else
                    @break
                @endif
            @endfor
        </div>
        @php
            $remainingProduct = $remainingProduct -  $productCounter;
            $productCounter = 0;
        @endphp
    @endfor
</section>


@extends('bootstrap')
@section('iconify')
@endsection

<script>

    function changeClass(className, classId) {
        var classNameInner = className.className;
        if (classNameInner.includes('disable')) {
            if (classId === 'product') {
                document.getElementById('service').classList.remove('active');
                document.getElementById('service').classList.add('disable');

                document.getElementById('product').classList.remove('disable');
                document.getElementById('product').classList.add('active');
            } else {
                document.getElementById('service').classList.remove('disable');
                document.getElementById('service').classList.add('active');

                document.getElementById('product').classList.remove('active');
                document.getElementById('product').classList.add('disable');
            }
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
