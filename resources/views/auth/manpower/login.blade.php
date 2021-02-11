<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Log In - User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
          <!-- Bootstrap Css -->
        <link href="{{asset('links/backend/01')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
           <!-- Icons Css -->
    <link href="{{asset('links/backend/01')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <!-- App Css-->
    <link href="{{asset('links/backend/01')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg" style="background-image: url({{ asset('public/links/backend/01/assets/images/auth-bg.png') }})">

        <div class="account-pages mt-5 mb-4 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="{{ route('frontend') }}" class="mb-5 d-block auth-logo">
                                <img src="{{ asset($websetting->logo) }}" alt="" height="100px" class="logo logo-dark">
                                <img src="{{ asset($websetting->logo) }}" alt="" height="100px" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">

                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to {{$websetting->company_name }}.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route(manpowerLoginFormSubmitRoute_HH) }}">
                                        @csrf
        
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                                        </div>
                
                                        <div class="form-group">
                                            <div class="float-right">
                                                <a href="" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                        </div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="auth-remember-check">
                                            <label class="custom-control-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-right">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"><i class="icon-xs icon mr-1" data-feather="log-in"></i> Log In</button>
                                        </div>
                                        
             
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p> {{$websetting->company_name }} &copy; Copyright By SOFTECH BD</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

       <!-- JAVASCRIPT -->
    <script src="{{asset('links/backend/01')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{asset('links/backend/01')}}/assets/libs/feather-icons/feather.min.js"></script>

        <script src="{{asset('links/backend/01')}}/assets/js/app.js"></script>

    </body>
</html>
