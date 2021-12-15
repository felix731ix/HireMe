<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('bootstrap')
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/index.css">
    <title>HireMe</title>
</head>

<body>
@auth
    @include('layout/navbar_home_authuser')
    @else
    @include('layout/navbar_home')
@endauth
<div class="banner-outter">
    <div class="banner row">
        <div class="text-bg col-md-4">
            <div class="text-bg-container">
                <div class="heading-title">Try become a freelancer</div>
                <div class="subheading-title">
                    Earn more income by offering the market
                    what you have
                </div>

                <div class="button-join-now" id="join-now-banner">
                    <a href="https://google.com">Join now</a>
                </div>
            </div>
        </div>
        <div class="banner-bg col-md-8">
            <img src="asset/Banner.png" alt="" id="banner-bg">
        </div>
    </div>
</div>

<div class="explore-outter">
    <div class="explore">
        <h2>Explore the market</h2>
        <div class="explore-item row">
            <div class="item col-md-3">
                <a href="https://google.com">
                    <div class="item-image">
                        <img src="/asset/Photograph.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Photograph</span>
                        <br>
                        <span id="item-details-subtitle">Products, Photographer, Photo Editor</span>
                    </div>
                </a>

            </div>
            <div class="item col-md-3">
                <a href="https://google.com">
                    <div class="item-image">
                        <img src="/asset/Lifestyle.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Lifestyle</span>
                        <br>
                        <span id="item-details-subtitle">Online Tutoring, Education, Gaming</span>
                    </div>
                </a>
            </div>
            <div class="item col-md-3">
                <a href="https://google.com">
                    <div class="item-image">
                        <img src="asset/Graphics & Design.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Graphics & Design</span>
                        <br>
                        <span id="item-details-subtitle">Logo & Brand Identity, Art & Illustration</span>
                    </div>
                </a>
            </div>
            <div class="item col-md-3">
                <a href="https://google.com">
                    <div class="item-image">
                        <img src="asset/Video & Animation.png" alt="">
                    </div>
                    <div class="explore-item-title">
                        <span id="item-details-title">Video & Animation</span>
                        <br>
                        <span id="item-details-subtitle">Video Editing & Animated Scene</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="why-us-outter">
    <div class="why-us">
        <div class="why-us-image">
            <img src="asset/why-us.png" alt="" width="666px" height="478px">
        </div>
        <div class="why-us-description">
            <h1 class="why-us-title">We bring the freelance products and services into your screen</h1>
            <div class="why-us-description-list">
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Best budget</span>
                        <br>
                        <span>Find high quality products and services from various price range.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Secured transaction</span>
                        <br>
                        <span>In ensuring customer satisfaction, your payment will be held by HireMe until you confirm the work.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">Post a request</span>
                        <br>
                        <span>Still didn’t found for what you need? Try post a request to let the sellers know what you need upfront.</span>
                    </div>
                </div>
                <div class="description-list">
                    <div class="icon-description-list">
                        <i class="icon-check"></i>
                    </div>
                    <div class="text-description-list">
                        <span class="text-description-title">24/7 technical support</span>
                        <br>
                        <span>Our support team is available to assist you anytime, anywhere.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Outter Modal -->
<div class="modal-join-sign-hireme" id="modalJoinHireme">
    <!-- Inside Modal -->
    <div class="modal-join-sign-content">
        <div class="modal-join-header">
            <i class="icon-close icon-hidden"></i>
            <div id="span-modal-header">Join HireMe</div>
            <i class="icon-close icon-active" id="icon-active-join"></i>
        </div>
        <div class="form-join-sign">
            <form action="/register" method="post" name="registerForm" class="register-form">
            @csrf
            <!-- name berguna untuk parsing di URL QueryParam -->
                <div>
                    <input type="email" name="email" class="join-sign-email-inputfield" id="email-join-field"
                           placeholder="E-mail" @error('email') is-invalid
                           @enderror value="{{old('email')}}" required>
                    @error("email")
                    <div id="join-email-error" class="join-email-error invalid-feedback"> {{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" class="join-sign-pass-inputfield" id="pass-join-field"
                           placeholder="Password" @error('password') is-invalid
                           @enderror required>
                    @error("password")
                    <div id="join-pass-error" class="join-pass-error invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <button type="submit" id="join-submit" class="join-sign-up">Sign Up</button>
            </form>
            <div class="already-have-account">
                <span>Already have an account?</span> <span id="switch-login">Login here</span>
            </div>
        </div>

    </div>

</div>
<!-- Outter Modal -->
<div class="modal-join-sign-hireme" id="modalLoginHireme">
    <!-- Inside Modal -->
    <div class="modal-join-sign-content">
        <div class="modal-join-header">
            <i class="icon-close icon-hidden"></i>
            <div id="span-modal-header">Login HireMe</div>
            <i class="icon-close icon-active" id="icon-active-login"></i>
        </div>
        @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{session('loginError')}}
            </div>
        @endif
        <div class="form-join-sign">
            <form action="/login" method="post" name="loginForm" class="login-form">
            @csrf
            <!-- name berguna untuk parsing di URL QueryParam -->
                {{--                    <div>--}}
                {{--                        <input type="email" name="email" class="join-sign-email-inputfield" id="email-join-field" placeholder="E-mail" @errors_handler('email') is-invalid--}}
                {{--                               @enderror value="{{old('email')}}" required>--}}
                {{--                        @errors_handler("email")--}}
                {{--                        <div id="join-email-errors_handler" class="join-email-errors_handler invalid-feedback" > {{$message}}</div>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                <div>
                    <input type="email" name="email" class="join-sign-email-inputfield" id="email-sign-field"
                           placeholder="E-mail" @error('email') is-invalid
                           @enderror value="{{old('email')}}" required>
                    @error("email")
                    <div id="sign-email-error" class="sign-email-error invalid-feedback"> {{$message}}</div>
                    @enderror
                </div>

                {{--                    <div>--}}
                {{--                        <input type="password" name="password" class="join-sign-pass-inputfield" id="pass-join-field" placeholder="Password" @errors_handler('password') is-invalid--}}
                {{--                               @enderror required>--}}
                {{--                        @errors_handler("password")--}}
                {{--                        <div id="join-pass-errors_handler" class="join-pass-errors_handler invalid-feedback">{{$message}} </div>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}

                <div>
                    <input type="password" name="password" class="join-sign-pass-inputfield" id="pass-sign-field"
                           placeholder="Password" @error('password') is-invalid
                           @enderror required>
                    @error("password")
                    <div id="join-pass-error" class="join-pass-error invalid-feedback">{{$message}} </div>
                    @enderror
                </div>

                <button type="submit" id="sign-submit" class="join-sign-up">Login</button>
            </form>
            <div class="already-have-account">
                <span>Still a new member?</span> <span id="switch-join">Join here</span>
            </div>
        </div>
    </div>
</div>
{{--<script src="js/modal-join-hireme.js"></script>--}}
{{--<script src="js/jquery-3.6.0.min.js"></script>--}}
</body>
</html>
