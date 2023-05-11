<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title> Telangana Wards Monitoring System   </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- Layout config Js -->
    <script src="{{asset('public/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- custom Css-->
    <link href="{{asset('public/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css//custom1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



<style>
    @media only screen and (max-width: 600px) {
 .login-left {
    display: none;
}
.login-right {
     width: 100%;
    height: 100vh;
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: contain;
    float: right;
}
.login-right {
    width: 100%;
    height: 100vh;
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: contain;
    float: right;
}
.title-mobile {
   display:block !important;
       margin-bottom: 30px;
}
}
.title-mobile {
    display:none;
}
</style>

</head>

<body>

    <div class="auth-page-wrapper">
        <!-- auth page bg -->


        <!-- auth page content -->
        <div class="auth-page-content">

                <!-- end row -->
                    <div class="login-left">

                        </div>
                    <div class="login-right text-center">

                        <div class="login ">

                            <center>
                                <img src="{{url('public/assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" />
                                <h4 class="title-mobile"><strong> Telangana Wards Monitoring System</h4>
                            </center>

                            <form method="POST" action="{{ route('login') }}" class="mt-3">
                                 @csrf
                                <div class="gorm-group">
                                    <input type="text" name="email" id="email" placeholder="Enter Username"  class="form-control @error('email') is-invalid @enderror"/>
                                     @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                     @enderror
                                </div>
                                <div class="gorm-group mb-4">
                                    <input type="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror pe-5 password-input" placeholder="Enter password" id="password-input"/>
                                     @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                     @enderror
                                </div>
                                <button type="submit" class="btn btn-success" value="" style="width: 100%">login</button>
                            </form><br>


                            <div style="margin-top:50px">
                             <p style="color:#000"><strong>For Support Call 9030081818 (10 AM to 6PM) during working days</strong></p>
                             <p style="color:#000"><strong>WhatsApp Support: +91 81423 81818</strong></p>
                        </div>

                        </div>

                    </div>


                <!--<div class="row justify-content-center">-->
                <!--    <div class="col-md-8 col-lg-6 col-xl-5">-->
                <!--        <div class="card ">-->

                <!--            <div class="card-body p-4">-->
                <!--                <div class="text-center mt-2">-->
                <!--                    <h5 class="text-primary">Welcome Back !</h5>-->
                <!--                    <p class="text-muted">Sign in to continue to ProperT</p>-->
                <!--                </div>-->
                <!--                <div class="p-2 mt-4">-->
                <!--                    <form method="POST" action="{{ route('login') }}">-->
                <!--                    @csrf-->
                <!--                        <div class="mb-3">-->
                <!--                            <label for="email" class="form-label">Email</label>-->
                <!--                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email">-->
                <!--                            @error('email')-->
                <!--                                <span class="invalid-feedback" role="alert">-->
                <!--                                    <strong>{{ $message }}</strong>-->
                <!--                                </span>-->
                <!--                            @enderror-->
                <!--                        </div>-->

                <!--                        <div class="mb-3">-->
                <!--                            <div class="float-end">-->
                <!--                                @if (Route::has('password.request'))-->
                <!--                                    <a class="text-mute" href="{{ route('password.request') }}">-->
                <!--                                        {{ __('Forgot Your Password?') }}-->
                <!--                                    </a>-->
                <!--                                @endif-->

                <!--                            </div>-->
                <!--                            <label class="form-label" for="password-input">Password</label>-->
                <!--                            <div class="position-relative auth-pass-inputgroup mb-3">-->
                <!--                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror pe-5 password-input" placeholder="Enter password" id="password-input">-->
                <!--                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>-->
                <!--                                @error('password')-->
                <!--                                    <span class="invalid-feedback" role="alert">-->
                <!--                                        <strong>{{ $message }}</strong>-->
                <!--                                    </span>-->
                <!--                                @enderror-->
                <!--                            </div>-->
                <!--                        </div>-->

                <!--                        <div class="form-check">-->
                <!--                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->

                <!--                            <label class="form-check-label" for="remember">-->
                <!--                                {{ __('Remember Me') }}-->
                <!--                            </label>-->
                <!--                        </div>-->

                <!--                        <div class="mt-4">-->
                <!--                            <button class="btn btn-warning w-100" type="submit">Sign In</button>-->
                <!--                        </div>-->

                <!--                    </form>-->




                <!--                </div>-->
                <!--            </div>-->

                <!--        </div>-->



                <!--    </div>-->
                <!--</div>-->
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>


    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('public/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('public/assets/js/plugins.js')}}"></script>

    <!-- particles js -->
    <script src="{{asset('public/assets/libs/particles.js')}}"></script>
    <!-- particles app js -->
    <script src="{{asset('public/assets/js/pages/particles.app.js')}}"></script>
    <!-- password-addon init -->
    <script src="{{asset('assets/js/pages/password-addon.init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    @if(Session::has('message'))
       var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            // case 'success':
            //     toastr.success("{{ Session::get('message') }}");
            //     break;
            // case 'warning':
            //     toastr.warning("{{ Session::get('message') }}");
            //     break;
            case 'error':
               toastr.error("{{ Session::get('message') }}");
               break;
        }
    @endif
</script>
</body>


</html>


