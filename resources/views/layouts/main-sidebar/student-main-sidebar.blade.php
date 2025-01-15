<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/student/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> 
            <span class="text-success">
                {{ trans('subjects_trans.Welcome2') }}: {{auth()->user()->name}}
            </span>
        </li>


        <!-- Quizzes-->
        <li>
            <a href="{{route('student_exams.index')}}"><i class="fas fa-pencil-ruler"></i><span
                    class="right-nav-text">{{trans('main_trans.Quizzes')}}</span></a>
        </li>


        <!-- profile-->
        <li>
            <a href="{{route('profile_student.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.profile') }}</span></a>
        </li>

    </ul>
</div>