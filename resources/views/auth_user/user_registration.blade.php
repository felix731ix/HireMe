<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/auth_user/auth_modal.css">
    @include('bootstrap')

    <title>Document</title>
</head>
<body>
<div class="modal-join-sign-hireme" id="modalJoinHireme">
    <!-- Inside Modal -->
    <div class="modal-join-sign-content">
        <div class="modal-join-header">
            <i class="icon-close icon-hidden"></i>
            <div id="span-modal-header">Join HireMe</div>
            <i class="icon-close icon-active" id="icon-active-join"></i>
        </div>
        <form action="/user-register" method="post" name="registerForm" class="register-form">
            @csrf
            <div class="input-field-list">
                <input type="text" name="name" class="join-sign-fullname-inputfield"
                       id="fullname-join-field"
                       placeholder="Full Name" @error('name') is-invalid
                       @enderror value="{{old('name')}}" required>
                @error('name')
                <div class="error-status">{{$message}}</div>
                @enderror
            </div>
            <div class="input-field-list">
                <input type="text" name="username" class="join-sign-fullname-inputfield"
                       id="fullname-join-field"
                       placeholder="Username" @error('username') is-invalid
                       @enderror value="{{old('username')}}" required>
                @error('username')
                <div class="error-status">{{$message}}</div>
                @enderror
            </div>

            <div class="input-field-list">
                <input type="email" name="email" class="join-sign-email-inputfield is-invalid" id="email-join-field"
                       placeholder="E-mail" @error('email') is-invalid
                       @enderror value="{{old('email')}}" required>
                @error('email')
                <div class="error-status">{{$message}}</div>
                @enderror
            </div>
            <div class="input-field-list">
                <input type="password" name="password" class="join-sign-pass-inputfield is-invalid" id="pass-join-field"
                       placeholder="Password" @error('password') is-invalid
                       @enderror required>
                @error('password')
                <div class="error-status">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" id="join-submit" class="join-sign-up">Sign Up</button>
        </form>
        <div class="already-have-account">
            <span>Already have an account?</span> <a href="/user-login" id="switch-login">Login here</a>
        </div>
    </div>

</div>
</div>
</body>
</html>
