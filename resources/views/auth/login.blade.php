<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <title>Pharaohs for School Management</title>

    <!-- Img Main icon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/coverPharaohs.jpg') }}" type="image/x-icon" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">

    {{-- @include('layouts.head') --}}

</head>

<body>
    <div class="wrapper" style="font-family: 'Cairo', sans-serif">
    
    <div class="wrapper">

        <!--================================= preloader -->
        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>
        <!--================================= preloader -->

        <!--================================= login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            {{-- Background Img --}}
            style=" 
            background-image: url('{{ asset('assets/images/coverPharaohs.jpg')}}');
            background-size: cover; /* Ensures the image covers the entire area */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            width: 100vw; /* Full viewport width */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Removes any default margin */
            padding: 0; /* Removes any default padding */
            ">
            {{-- style="background-image: url(assets/images/login-bg.jpg);"> --}}
            {{-- End Background Img --}}
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align"> 
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg">
                        <div class="login-fancy pb-40 clearfix"> 
                            
                                        @if($type == 'student')
                                            <h3 class="text-white mb-1" style="font-family: 'Cairo', sans-serif" class="mb-30" title="تسجيل دخول ( طالب )">
                                                Sign In as <span class="text-success">( Student )</span>
                                            </h3>
                                        @elseif($type == 'parent')
                                            <h3 class="text-white mb-1" style="font-family: 'Cairo', sans-serif" class="mb-30" title="تسجيل دخول ( ولي أمر )">
                                                Sign In as <span class="text-success">( Parent )</span>
                                            </h3>
                                        @elseif($type == 'teacher')
                                            <h3 class="text-white mb-1" style="font-family: 'Cairo', sans-serif" class="mb-30" title="تسجيل دخول ( مُعلم )">
                                                Sign In as <span class="text-success">( Teacher )</span>
                                            </h3>
                                        @else
                                            <h3 class="text-white mb-1" style="font-family: 'Cairo', sans-serif" class="mb-30" title="تسجيل دخول ( مُشرف )">
                                                Sign In as <span class="text-success">( Admin )</span>
                                            </h3>
                                        @endif <hr> 
                                    
                                        @if ($errors->any())
                                        <div class="alert alert-danger" title=".هذه البيانات لا تتطابق مع سجلاتنا">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif 
                                
                                <form method="POST" action="{{route('login')}}">
                                    @csrf 
                                <div class="section-field mb-40"> 
                                    <label class="text-white mb-1" for="name" title="البريد الالكتروني">
                                        <h6 class="text-white mb-1" style="font-family: 'Cairo', sans-serif;">
                                            Email
                                        </h6>
                                    </label>
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <input type="hidden" value="{{$type}}" name="type"> 
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                            
                                <div class="section-field mb-20">
                                    <label class="text-white mb-1" for="Password" title="كلمة المرور">
                                        <h6 class="text-white mb-1" style="font-family: 'Cairo', sans-serif;">
                                            Password
                                        </h6>
                                    </label>
                                    <div class="input-group">
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        <div class="input-group-append">
                                            <span title="{{ trans('subjects_trans.show_pass') }}" class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                                <i class="fa fa-check" id="toggleIcon"></i> <!-- Eye Icon -->  
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> 
                                
                                <div class="section-field">
                                    <div class="remember-checkbox mb-1">
                                        <input type="checkbox" class="form-control" name="two" id="two" />
                                        <label for="two" class="text-white mb-20"> 
                                            <h5 title="تذكرني" class="text-white mb-20" style="font-family: 'Cairo', sans-serif;">
                                                Remember me
                                            </h5>
                                        </label> 
                                    </div>
                                </div>
                                <button class="button" style="font-family: 'Cairo', sans-serif;" title="دخول">
                                    <span>  Sign In  </span>
                                    <i class="fa fa-check"></i>
                                </button> 
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================================= login-->

    </div>
    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>

    <!-- chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>


    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password"); // Updated to match your input ID
            var icon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // Change icon to eye-slash when showing password
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // Change icon back to eye when hiding password
            }
        }
    </script>
</body>

</html>