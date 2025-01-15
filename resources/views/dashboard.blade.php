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

        @include('layouts.main-header-admin')

        @include('layouts.main-sidebar')

        <!--=================================
Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h3 class="mb-0" style="font-family: 'Cairo', sans-serif"> 
                            <span class="text-primary">
                                {{ trans('subjects_trans.Welcome2') }}: {{auth()->user()->name}} 
                            </span>
                        </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div> 
            <hr>
            <div class="row" > 
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
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
                                    <h4>{{\App\Models\Student::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('Students.index')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.View_Data') }}</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('subjects_trans.Number_of_Teachers') }}</p>
                                    <h4>{{\App\Models\Teacher::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('Teachers.index')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.View_Data') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('subjects_trans.Number_of_Parents') }}</p>
                                    <h4>{{\App\Models\My_Parent::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('add_parent')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.View_Data') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('subjects_trans.Number_of_Classrooms') }}</p>
                                    <h4>{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i>
                                <a href="{{route('Sections.index')}}" target="_blank">
                                    <span class="text-primary">{{ trans('subjects_trans.View_Data') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Orders Status widgets--> 
            
            <div class="row">
                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{ trans('subjects_trans.Last_System_Operations') }}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true"> {{ trans('subjects_trans.Students') }}</a>
                                            </li> 
                                        
                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                    role="tab" aria-controls="teachers" aria-selected="false">{{ trans('subjects_trans.teachers') }}
                                                </a>
                                            </li>
                                        
                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                    role="tab" aria-controls="parents" aria-selected="false">{{ trans('subjects_trans.parents') }}
                                                </a>
                                            </li>
                                        
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                                    role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
                                                </a>
                                            </li> --}}
                                        
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                
                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('subjects_trans.student_name') }}</th>
                                                    <th>{{ trans('subjects_trans.Email') }}</th>
                                                    <th>{{ trans('subjects_trans.Sex') }}</th>
                                                    <th>{{ trans('subjects_trans.Grade') }}</th>
                                                    <th>{{ trans('subjects_trans.classrooms') }}</th>
                                                    <th>{{ trans('subjects_trans.section') }}</th>
                                                    <th>{{ trans('subjects_trans.Added_Date') }}</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Student::latest()->take(25)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td class="text-success">{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->gender->Name}}</td>
                                                        <td>{{$student->grade->Name}}</td>
                                                        <td>{{$student->classroom->Name_Class}}</td>
                                                        <td>{{$student->section->Name_Section}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{ trans('subjects_trans.no_data') }}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                
                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th> 
                                                    <th>{{ trans('subjects_trans.Teacher_Name') }}</th>
                                                    <th>{{ trans('subjects_trans.Sex') }}</th>
                                                    <th>{{ trans('subjects_trans.Specialization') }}</th>
                                                    <th>{{ trans('subjects_trans.Assignment_Date') }}</th>
                                                    <th>{{ trans('subjects_trans.Added_Date') }}</th>  
                                                </tr>
                                                </thead>
                                            
                                                @forelse(\App\Models\Teacher::latest()->take(25)->get() as $teacher)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td class="text-success">{{$teacher->Name}}</td>
                                                        <td>{{$teacher->genders->Name}}</td>
                                                        <td>{{$teacher->specializations->Name}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td class="text-success">{{$teacher->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{ trans('subjects_trans.no_data') }}</td>
                                                    </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div> 
                                    
                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('subjects_trans.Parent_Name') }}</th>
                                                    <th>{{ trans('subjects_trans.Email') }}</th>
                                                    <th>{{ trans('subjects_trans.ID_Number') }}</th>
                                                    <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
                                                    <th>{{ trans('subjects_trans.Phone_Number') }}</th>  
                                                    <th>{{ trans('subjects_trans.Job_title') }}</th> 
                                                    <th>{{ trans('subjects_trans.Added_Date') }}</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\My_Parent::latest()->take(25)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td class="text-success">{{$parent->Name_Father }} <hr> {{ $parent->Name_Mother }} </td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->National_ID_Father }} <hr> {{ $parent->National_ID_Mother }} </td>
                                                        <td>{{$parent->Passport_ID_Father }} <hr> {{$parent->Passport_ID_Mother }} </td> 
                                                        <td>{{$parent->Phone_Father }} <hr> {{ $parent->Phone_Mother }} </td>
                                                        <td>{{$parent->Job_Father }} <hr> {{$parent->Job_Mother }} </td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{ trans('subjects_trans.no_data') }}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                    
                                    {{--Invoices Table--}}
                                    {{-- <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>تاريخ الفاتورة</th>
                                                    <th>اسم الطالب</th>
                                                    <th>المرحلة الدراسية</th>
                                                    <th>الصف الدراسي</th>
                                                    <th>القسم</th>
                                                    <th>نوع الرسوم</th>
                                                    <th>المبلغ</th>
                                                    <th>تاريخ الاضافة</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Fee_invoice::latest()->take(25)->get() as $invoice)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->invoice_date}}</td>
                                                        <td>{{$invoice->student->name}}</td>
                                                        <td>{{$invoice->grade->Name}}</td>
                                                        <td>{{$invoice->classroom->Name_Class}}</td>
                                                        <td>{{$invoice->section->Name_Section}}</td>
                                                        <td class="text-success">{{$invoice->created_at}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">لا توجد بيانات</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================================= wrapper --> 
        
            <!--================================= livewire calendar -->
            <livewire:calendar /> <br>
            <!--================================= livewire calendar -->
            
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