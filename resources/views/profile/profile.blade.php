<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/layout/navbar_marketplace.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile/profile.css')}}">
    @include('bootstrap')
    <title>Profile</title>
</head>
<body>
@auth
    @include('layout/navbar_marketplace_authuser')
@else
    @include('layout/navbar_marketplace')
@endauth
<div class="profile-title container">
    My Profile
</div>
<section class="d-flex container justify-content-between">
    <div class="user-profile text-center" style="width: 350px">
        <div class="upload-photo">
            <img src="{{Storage::url(auth()->user()->profile_picture)}}" width="175" height="175"
                 style="border-radius: 100px; object-fit: cover">
        </div>
        <div class="profile-details" style="overflow: hidden">
            <form action="/update-profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="text-align: center; margin: 20px 0" method="post">
                    <input id="btnUploadProfile" class="btnUploadFileHidden" name="profile_picture" type="file">
                </div>
                <div class="d-flex" style="margin-bottom: 8px">
                    <div class="text-left" style="width: 35%">Full name</div>
                    <div class="text-right flex-shrink-1"><input name="name" class="input-field"
                                                                 style="text-align:right; width: 80%"
                                                                 value="{{auth()->user()->name}}"></div>
                </div>
                <div class="d-flex justify-content-between" style="margin: 8px 0">
                    <div class="text-left">Email</div>
                    <div class="text-right"><input name="email" class="input-field" style="text-align: right"
                                                   value="{{auth()->user()->email}}"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="text-left">Password</div>
                    <div class="text-right"><input name="password" type="password" class="input-field input-password"
                                                   style="text-align: right; width: 80%"
                                                   placeholder="Change Password"></div>
                </div>
                @error('name')
                <div class="error-label">
                    <span>{{$message}}</span>
                </div>
                @enderror
                @error('email')
                <div class="error-label">
                    <span>{{$message}}</span>
                </div>
                @enderror
                @error('password')
                <div class="error-label">
                    <span>{{$message}}</span>
                </div>
                @enderror
                <div>
                    <button class="btnSaveChanges" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="user-menu w-75">
        <nav class="navbar-custom">
            <div class="d-flex">
                <span class="nav-item-custom nav-link" href="#">Transaction History</span>
            </div>
        </nav>
        <table class="table" style="margin-top: 24px; font-size: 1.4rem">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Total Payment</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @for($i=0;$i<count($listTransaction);$i++)
                @php
                    $totalPayment = 0;
                @endphp
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$listTransaction[$i]->created_at}}</td>
                    <td>
                        @php
                            for($j=0;$j<count($listTransaction[$i]->transactionDetails);$j++){
                                $quantity = $listTransaction[$i]->transactionDetails[$j]->quantity;
                                 $productPrice = $listTransaction[$i]->transactionDetails[$j]->products->price;
                                 $totalPayment = $quantity * $productPrice;
                            }
                        @endphp
                            @currency($totalPayment)
                    </td>
                    <td>
                        <form action="/export" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$listTransaction[$i]->id}}">
                            <button type="submit" style="border: transparent; outline: none; background-color: transparent; cursor: pointer">
                                <span style="font-size: 24px; background-color: var(--primary_green); color: white; padding: 3px; border-radius: 100px" class="iconify" data-icon="carbon:document-download"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
