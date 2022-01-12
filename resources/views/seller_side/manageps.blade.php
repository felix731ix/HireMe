<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/layout/navbar_seller.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontello.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/profile/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('bootstrap')
    <title>Dashboard - Manage P S</title>
</head>

<body>
    @include('layout.navbar_seller')
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" style="color: #43D06B; font-size:14px;">Seller</a></li>
                    <li class="breadcrumb-item active" style="font-size: 14px" aria-current="page">Manage Products &
                        Services</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </div>
        <div class="section-wrapper mt-5">
            <div class="3 mt-2 mb-4">
                <a href="/add-new-item">
                    <button type="submit" class="add-new-item">
                        + Add New Item
                    </button>
                </a>
            </div>

            <div class="something">
                <table class="table table-striped align-middle text-center" style="font-size: 14px">
                    {{-- @if (count($carts) > 0) --}}
                    <thead>
                        <tr>
                            <th style="col-md-1">No</th>
                            <th style="col-md-2">Image</th>
                            <th style="col-md-3">Name</th>
                            <th style="col-md-2">Category</th>
                            <th style="col-md-1">Price</th>
                            <th style="col-md-2">Action</th>
                        </tr>
                    </thead>
                    {{-- @endif --}}
                    {{-- @forelse ($carts as $cart) --}}
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <a href="#">
                                <img src="/storage/product_img_storage/product1_1.jpg" width="56px" height="56px"
                                    style="object-fit:cover" alt="...">
                            </a>
                        </td>
                        <td>
                            {{-- <a href="#">
                                <img src="/storage/product_img_storage/product1_1.jpg" width="56px" height="56px"
                                    style="object-fit:cover" class="card-img-top" alt="...">
                            </a> --}}
                            Customizeable YoutTube
                        </td>
                        <td>
                            Photography
                        </td>
                        <td>
                            Rp 250.000
                        </td>
                        <td>
                            <a href="/update-item">
                                <button class="btn btn-outline-success" style="font-size: 14px">Edit</button>
                            </a>
                            {{-- <form action="cart/{{ $cart->furniture->id }}" method="POST">
                            @method('delete')
                            @csrf --}}
                            <button class="btn btn-outline-danger" style="font-size: 14px">Delete</button>
                            {{-- </form> --}}
                        </td>
                    </tr>

                    {{-- @endforelse --}}
                </table>
            </div>
        </div>
    </div>
</body>

</html>
