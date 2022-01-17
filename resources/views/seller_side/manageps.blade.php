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
                <ol class="breadcrumb" style="background-color: transparent!important;">
                    <li class="breadcrumb-item"><a href="/switch-to-seller"
                            style="color: var(--primary_green_second); font-size:1.4rem;">Seller</a></li>
                    <li class="breadcrumb-item active"
                        style="font-size: 14px; color: var(--primary_green)"
                        aria-current="page">Manage Products &
                        Services
                    </li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

        </div>
        <div class="section-wrapper mt-5">
            <div class="3 mt-2 mb-4">
                <form action="/add-new-item" method="get">
                    <button type="submit" class="add-new-item" style="color: white">
                        <span style="font-size: 2.0rem">+</span>
                        <span style="font-size: 1.6rem">Add New Item</span>
                    </button>
                </form>
            </div>

            <div class="something">
                <table class="table table-striped align-middle text-center" style="font-size: 14px">
                    @if (count($products) > 0)
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @endif
                    @forelse ($products as $product)
                    <tr style="vertical-align: center">
                        <td style="padding: 20px; vertical-align: top; padding-top: 2.5em">
                            {{ $loop->index + 1 }}
                        </td>
                        <td style="text-align: start; padding: 20px; width: 30%">
                            <a href="/marketpage/{{ $product->id }}" style="color: black; display: flex">
                                <div>
                                    <img src="/storage/{{ $product->image }}" width="56px" height="56px"
                                        style="object-fit:cover; border-radius: 8px">
                                </div>
                                <div class="item-link" style="padding-left: 1em; max-width: 400px; padding-top: 0.8em">
                                    {{ $product->name }}
                                </div>
                            </a>
                        </td>
                        <td style="padding-top: 2em" width="15%">
                            {{ $product->category->name }}
                        </td>
                        <td style="padding-top: 2em" width="20%">
                            @currency($product->price)
                        </td>
                        <td style="display: flex; justify-content: space-around; padding: 2em 4em">
                            <form action="/update-item/{{ $product->id }}/edit" method="get">
                                <button class="actionButtonSeller" style="cursor: pointer">Edit</button>
                            </form>
                            <form class="d-inline" action="/remove-item/{{ $product->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="actionButtonSeller actionButtonSellerRemove" style="cursor: pointer">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <section class="container" style="text-align: center">
                        <img src="{{URL::asset('asset/Illustrations/empty_cart.svg')}}" width="364px" height="364px">
                        <div>
                            <h5
                                style="font-weight: normal!important; font-style: italic; font-size: 1.4rem !important;line-height: 1.5;margin: 1em 0; padding: 0 35%">
                                Looks still empty here, let's add some products</h5>
                            <form ACTION="/add-new-item">
                                <button class="btnMarket">Add Product</button>
                            </form>
                        </div>
                    </section>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</body>

@if (session('status'))
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="/asset/Illustrations/well_done.svg" class="img-fluid" alt="" style="max-width: 300px">
            </div>
            <div class="modal-footer border-0 justify-content-center flex-column pb-5">
                <div class="mb-4">
                    <h3>{{ session('status') }}</h3>
                </div>
                <button type="button" class="add-new-item" style="color: white">
                    <span style="font-size: 1.6rem" data-dismiss="modal" aria-label="Close">Okay !</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
    document.onreadystatechange = function () {
    myModal.show();
};
</script>
@endif

</html>
