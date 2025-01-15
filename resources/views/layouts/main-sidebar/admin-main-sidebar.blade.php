<div class="scrollbar side-menu-bg"> 
    <ul class="nav navbar-nav side-menu" id="sidebarnav" style="background-color: #00293d">
        <!-- menu item Dashboard-->
    
        @can('Home')
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i>
                    <span class="right-nav-text">
                        {{trans('main_trans.Dashboard')}} 
                    </span>
                </div>
                <div class="clearfix"></div>
            </a> 
        </li> 
        @endcan
    
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">  
            <span class="text-primary">
                {{ trans('subjects_trans.Welcome2') }}: {{auth()->user()->name}}
            </span>
        </li>
        
        <!-- Grades -->
        @can('Grades')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                <div class="pull-left"><i class="fas fa-school"></i><span
                        class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                
                <li><a href="{{Route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>
                
            </ul>
        </li>
        @endcan
        
        <!-- Classes -->
        @can('Classes')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                <div class="pull-left"><i class="fa fa-building"></i><span
                        class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a> </li>
            </ul>
        </li>
        @endcan
    
        <!-- Sections -->
        @can('Sections')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="Sections">{{trans('main_trans.sections')}}</a> </li>
            </ul>
        </li>
        @endcan

        <!-- Students -->
        @can('Students')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                <div class="pull-left"><i class="fas fa-user-graduate"></i><span class="right-nav-text">{{trans('main_trans.students')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                @can('list Students')
                <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> </li>
                @endcan
            
                @can('Add student')
                <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a> </li>
                {{-- <li> <a href="{{route('')}}">{{trans('main_trans.Student_information')}}</a> </li> --}}
                {{-- <li> <a href="{{route('')}}">{{trans('main_trans.list_Promotions')}}</a> </li> --}}
                @endcan
            
                @can('Students Promotions list')
                <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.Students_Promotions_list')}}</a> </li>
                {{-- <li> <a href="{{route('')}}">{{trans('main_trans.add_Promotion')}}</a> </li> --}}
                @endcan
            
                @can('Students Promotions')
                <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.Students_Promotions')}}</a> </li>
                @endcan
            
                @can('Graduations List')
                <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                @endcan
            
                {{-- <li> <a href="{{route('')}}">{{trans('main_trans.Graduate_students')}}</a> </li> --}}
                @can('Add Graduate')
                <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                @endcan
            </ul>
        </li>
        @endcan
        
        {{-- Teachers --}}
        @can('Teachers')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                {{-- @can('List Teachers') --}}
                <li> <a href={{Route("Teachers.index")}}>{{trans('main_trans.List_Teachers')}}</a> </li>
                {{-- @endcan --}}
            </ul>
        </li>
        @endcan
    
        {{-- Parents --}}
        @can('Parents')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                <div class="pull-left"><i class="fas fa-user-tie"></i><span class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
                {{-- <li> <a href="{{url('add_parent')}}">{{trans('main_trans.Add_Parent')}}</a> </li> --}}
            </ul>
        </li>
        @endcan 
    
        {{-- Accounts --}}
        @can('Accounts')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                <div class="pull-left"><i class="ti-id-badge"></i><span class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                @can('Tuition Fees')
                <li> <a href="{{route('Fees.index')}}">{{trans('accounts_trans.fees')}}</a> </li>
                @endcan
            
                @can('Tuition invoices')
                <li> <a href="{{route('Fees_Invoices.index')}}">{{trans('main_trans.Tuition_invoices')}}</a> </li>
                @endcan
            
                @can('Payments')
                <li> <a href="{{route('receipt_students.index')}}">{{trans('accounts_trans.payments')}}</a> </li>
                @endcan
            
                @can('Exclude fees')
                <li> <a href="{{route('ProcessingFee.index')}}">{{trans('main_trans.Exclude_fees')}}</a> </li>
                @endcan
            
                @can('Refund of fees')
                <li> <a href="{{route('Payment_students.index')}}">{{trans('accounts_trans.refund_of_fees')}}</a> </li>
                @endcan
            </ul> 
        </li>
        @endcan
    
        <!-- Quizzes-->
        @can('Quizzes List')
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                <div class="pull-left"><i class="fas fa-pencil-ruler"></i><span class="right-nav-text">{{trans('main_trans.Quizzes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                @can('Quizzes')
                <li> <a href="{{route('Quizzes.index')}}">{{trans('main_trans.Quizzes')}}</a> </li>
                @endcan
            
                @can('Questions List')
                <li> <a href="{{route('questions.index')}}">{{trans('subjects_trans.questions_list')}}</a> </li>
                @endcan
            </ul>
        </li>
        @endcan
    
        {{-- Study_materials --}} 
        @can('Study materials')
        <li>
            <a href="{{route('subjects.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.Study_materials')}}</span> </a>
        </li>
        @endcan
    
        {{-- Attendance --}}
        @can('Attendance')
        <li>
            <a href="{{route('Attendance.index')}}"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span> </a>
        </li>
        @endcan
    
        {{-- Library - Onlineclasses --}}
        <li>
            @can('Library')
            <a href="{{route('library.index')}}"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span> </a>
            @endcan
            
            @can('Online lectures')
            <a href="{{route('online_classes.index')}}"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('subjects_trans.Online_lectures')}}</span> </a>
            @endcan
        </li> 
    
        <!-- profile-->
        @can('Profile')
        <li>
            <a href="{{route('admin_profile.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.profile') }}</span></a>
        </li>
        @endcan
    
        <!-- Settings-->
        @can('Settings')
        <li>
            <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>
        </li>
        @endcan 
        
            </ul> 
        </li>
    </ul>
</div>