<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    @livewireStyles
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--================================= preloader -->

<div id="pre-loader">
    <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
</div>

        <!--================================= preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" > 
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">  
                            <span class="text-primary">
                                {{ trans('subjects_trans.Welcome2') }}: {{auth()->user()->Name}} 
                            </span>
                        </h4>
                    </div> <br><br>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <!-- widgets -->
            <div class="row" >
            
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-black">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('subjects_trans.Number_of_Students') }}</p>
                                    <h4> {{$students_count}} </h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('Student.index')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.View_Data') }}</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('subjects_trans.Number_of_Sections') }}</p>
                                    <h4> {{$sections_count}} </h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('sections')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.Number_of_Students') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Orders Status widgets-->  
            <!--================================= livewire calendar -->
            <livewire:calendar /> <br>
            <!--================================= livewire calendar -->

            <!--================================= wrapper --> 

            <!--================================= footer -->
            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--================================= footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')

</body>

</html>