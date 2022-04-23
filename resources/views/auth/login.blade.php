<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login | {{ config('app.name') }} </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/switches.css') }}">
</head>
<body class="form">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Log In to <a href="/"><span class="brand-name">Shale Pizza</span></a></h1>
                        <form class="text-left" method="POST" action="{{ route('login') }}"> @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="email" type="text" class="form-control" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                          <input type="checkbox" class="new-control-input">
                                          <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="field-wrapper">
                                    <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                                </div> --}}

                            </div>
                        </form>
                        <p class="terms-conditions">© 2022 All Rights Reserved. <a href="/">Shale Pizza</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <img src="{{ asset('dashboard/assets/img/pizza-bgcover.jpg') }}" alt="">
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard/assets/js/authentication/form-1.js') }}"></script>

</body>
</html>
