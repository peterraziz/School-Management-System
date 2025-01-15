<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/parent/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i>
                    <span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
            <span class="text-success">
                {{ trans('subjects_trans.Welcome') }}: <br>{{auth()->user()->Name_Father}} <br> {{auth()->user()->Name_Mother}} 
            </span>
        </li> 
        
        <!-- children-->
        <li>
            <a href="{{route('sons.index')}}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.children') }}</span></a>
        </li>
        
        
        
        <!-- Attendance Reports-->
        <li>
            <a href="{{route('sons.attendances')}}"><i class="fas fa-calendar-alt"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.Attendance_Reports') }}</span></a>
        </li>
        
        
        
        <!-- Accounts-->
        <li>
            <a href="{{route('sons.fees')}}"><i class="ti-id-badge"></i><span
                    class="right-nav-text">{{trans('main_trans.Accounts')}}</span></a>
        </li>
        
        
        <!-- profile-->
        <li>
            <a href="{{route('profile_parent.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('subjects_trans.profile') }}</span></a>
        </li>
        
    </ul>
</div>