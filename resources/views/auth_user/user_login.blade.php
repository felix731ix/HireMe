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

<div class="modal-join-sign-hireme" id="modalLoginHireme">
    <!-- Inside Modal -->
    <div class="modal-join-sign-content">
        <div class="modal-join-header">
            <i class="icon-close icon-hidden"></i>
            <div id="span-modal-header">Login HireMe</div>
            <i class="icon-close icon-active" id="icon-active-login"></i>
        </div>
        @if(session()->has('success'))
            <div class="form-join-sign">
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <div class="form-join-sign">
                    <form action="/user-login" method="post" name="loginForm" class="login-form">
                        @csrf
                        <div class="input-field-list">
                            <input type="email" name="email" class="join-sign-email-inputfield" id="email-sign-field"
                                   placeholder="E-mail">
                        </div>
                        <div class="input-field-list">
                            <input type="password" name="password" class="join-sign-pass-inputfield"
                                   id="pass-sign-field"
                                   placeholder="Password">
                        </div>
                        @if(session()->has('loginError'))
                            <div class="error-status">{{session('loginError')}}</div>
                        @endif
                        <button type="submit" id="sign-submit" class="join-sign-up">Login</button>
                    </form>
                    <div class="already-have-account">
                        <span>Don't have an account?</span> <a href="/user-register" id="switch-join">Join here</a>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
