<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <title>DreamsChat - HTML Mobile Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

</head>

<body>

        <div class="splash-screen">
            <div class="splash-logo">
                <img src="assets/img/logo.png" alt="">
            </div>
        </div>
                
        <div class="main-wrapper login-page">
            <div class="container">
                
                <div class="login-icon">
                    <div class="login-top-icon">
                        <div class="inner-top-icon">
                            <img src="assets/img/icons/login-icon.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="login-title">
                    <span>Enter your email and password to login</span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    <div class="login-form">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                        <div class="bottom-submit">
                            <div class="left">
                                <ul>
                                    <li class="active"></li>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="right">
                                <button type="submit" class="submit-btn"><img src="assets/img/icons/arrow.png" alt=""></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
</body>


<!-- Mirrored from dreamschat-framework7.dreamguystech.com/template-bootstrap/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 09:13:07 GMT -->
</html>
