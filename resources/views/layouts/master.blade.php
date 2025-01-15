<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">
        

        <!--================================= preloader -->
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        <!--================================= preloader -->

        @if (auth('web')->check())
            @include('layouts.main-header-admin')
        @else
            @include('layouts.main-header')
        @endif
        
        @include('layouts.main-sidebar')

        <!--=================================Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

        @yield('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                {{-- <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">{{trans('main_trans.Dashboard')}}</a></li> --}}
                <li class="breadcrumb-item active">@yield('PageTitle')</li>
            </ol>
        </div>
    </div>

            @yield('content')

            <!--================================= wrapper -->

            <!--================================= footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--================================= footer -->

    @include('layouts.footer-scripts')

</body>

</html>