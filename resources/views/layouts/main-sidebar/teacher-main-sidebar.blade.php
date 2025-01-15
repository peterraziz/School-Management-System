<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
            <span class="text-success">
                {{ trans('subjects_trans.Welcome2') }}: {{auth()->user()->Name}}
            </span> 
        </li>
        
        <!-- sections-->
        <li>
            <a href="{{route('sections')}}"><i class="fas fa-chalkboard"></i><span
                class="right-nav-text">{{trans('main_trans.sections')}}</span></a>
        </li>
        
        <!-- students-->
        <li>
            <a href="{{route('Student.index')}}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">{{trans('main_trans.students')}}</span></a>
        </li>
        
        <!-- Quizzes--> 
            <li>
                <a href="{{route('QuizzesTeacher.index')}}"><i class="fas fa-pencil-ruler"></i>
                    <span class="right-nav-text">{{trans('main_trans.Quizzes')}}</span> 
                </a>
            </li>
            
            {{-- Onlineclasses --}}
        <li> 
            <a href="{{route('online_zoom_classes.index')}}"><i class="fas fa-video"></i>
                <span class="right-nav-text">{{trans('subjects_trans.Online_lectures')}}</span>
            </a>
        </li>
        
        <!-- Attendance-->
        <li> 
            <a href="{{route('attendance.report')}}"><i class="fas fa-calendar-alt"></i>
                <span class="right-nav-text">{{trans('main_trans.Attendance')}}</span>
            </a>
        </li> 
        
        <!-- profile-->
        <li>
            <a href="{{route('profile.show')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.profile') }}</span></a>
        </li>
    
    </ul>
</div>