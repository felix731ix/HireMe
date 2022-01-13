<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_seller.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile/profile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/seller_side/seller.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
        integrity='sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=='
        crossorigin='anonymous' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
        integrity='sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=='
        crossorigin='anonymous' />
    @include('bootstrap')
    <title>Dashboard - Update Item</title>
</head>

<body>
    @include('layout.navbar_seller')
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb mt-4">
                <ol class="breadcrumb" style="background-color: transparent!important;">
                    <li class="breadcrumb-item"><a href="#" style="color: var(--primary_green); font-size:1.4rem;">Seller</a></li>
                    <li class="breadcrumb-item"><a href="/manageps" style="color: var(--primary_green); font-size:1.4rem;">Manage
                            Products & Services</a></li>
                    <li class="breadcrumb-item active" style="color: var(--primary_green); font-size:1.4rem; font-weight: var(--weight500)" aria-current="page">Update Item</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex create-title mt-5">
                    <div class="back-btn mb-4">
                        <a href="javascript:history.back()">
                            <i class="fa-solid fa-arrow-left me-2" style="font-size: 2.5rem; color:#43D06B"></i>
                        </a>
                    </div>
                    <h1 style="margin-left: 20px">Update Item</h1>
                </div>
                <form action="/update-item/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-container py-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control-custom @error('name') is-invalid @enderror" id="name"
                                placeholder="Name" name="name" value="{{ old('name', $product->name) }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control-custom @error('description') is-invalid @enderror"
                                id="description" placeholder="Description" name="description"
                                value="{{ old('description', $product->description) }}">
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-control-custom" name="category_id" style="width: 100%">
                                <option value="">-Choose Category-</option>
                                @foreach ($categories as $category)
                                @if (old('category_id', $product->category_id) == $category->id)
                                <option value="{{ $category->id }}" name="category_id" selected>{{ $category->name }}
                                </option>
                                @else
                                <option value="{{ $category->id }}" name="category_id">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control-custom @error('price') is-invalid @enderror" id="price"
                                placeholder="Price" name="price" value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label" style="font-size:1.4rem;">Image</label>
                            <input type="hidden" name="oldImage" value="{{ $product->image }}">
                            @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control-custom @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="submit-button d-flex justify-content-center">
                            <button type="submit" class="add-new-item" style="color: white">
                                Update Item
                            </button>
                        </div>
                    </div>
            </div>

</body>

<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

</html>
