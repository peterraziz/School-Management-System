<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Pharaohs for School Management</title>

    <!-- Img Main icon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/coverPharaohs.jpg') }}" type="image/x-icon" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    
    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
</head>


<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">
    
        <div class="wrapper">
    
    <!--================================= preloader -->
    <div id="pre-loader">
        <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
    </div>
    <!--================================= preloader -->
        
        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            {{-- Background Img --}}
            style="
            background-image: url(assets/images/coverPharaohs.jpg);
            background-size: cover; /* Ensures the image covers the entire area */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            width: 100vw; /* Full viewport width */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Removes any default margin */
            padding: 0; /* Removes any default padding */
            ">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    
                
                    <div class="col-lg-8 col-md-8 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
                        <div class="login-fancy pb-40 clearfix">
                            
                            <div class="text-center" style="font-family: 'Cairo', sans-serif;">
                                <h1 title="حدد طريقة الدخول" style="font-family: 'Cairo', sans-serif;" class="text-white" class="mb-30">
                                        {{-- حدد طريقة الدخول --}}
                                            Select your entry method 
                                </h1><br>
                            </div>
                            
                            <div class="form-inline">
                                
                                <a class="btn btn-default col-lg-3" title="طالب" href="{{route('login.show','student')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/studentt.png')}}">
                                    <p style="font-family: 'Cairo', sans-serif" class="text-white" class="text-center">Student</p>
                                </a>
                                
                                <a class="btn btn-default col-lg-3" title="ولي أمر" href="{{route('login.show','parent')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/parents.png')}}">
                                    <p style="font-family: 'Cairo', sans-serif" class="text-white" class="text-center">Parent</p>
                                </a>
                                
                                <a class="btn btn-default col-lg-3" title="مُعلم" href="{{route('login.show','teacher')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                    <p style="font-family: 'Cairo', sans-serif" class="text-white" class="text-center">Teacher</p>
                                </a>
                                
                                <a class="btn btn-default col-lg-3" title="مُشرف" href="{{route('login.show','admin')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                    <p style="font-family: 'Cairo', sans-serif" class="text-white" class="text-center">Admin</p>
                                </a>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================================= login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>