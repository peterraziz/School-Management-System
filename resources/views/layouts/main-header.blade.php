        <!--================================= header start--> 
            <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row side-menu-bg" 
                    style="background-image: url('{{ asset('assets/images/old_eg_r.jpg') }}'); background-size: cover; background-position: center;">
                <!-- logo -->
                <div class="text-center navbar-brand-wrapper"> 
                        @if (App::getLocale() == 'ar')
                        <img src="{{ asset('assets/images/logoAR.png') }}" width="185" height="65" alt="Logo">
                        @else
                        <img src="{{ asset('assets/images/logoEN.png') }}" width="185" height="65" alt="Logo">
                        @endif  
                </div>
                <!-- Top bar left -->
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);">
                            <i class="zmdi zmdi-menu ti-align-right" style="color: rgb(0, 0, 0);"></i>
                        </a>
                    </li> 
                </ul>
                
                <div style="background-color: rgba(0, 0, 0, 0.341); padding: 10px 20px; border-radius: 8px; text-align: center; display: inline-block;">
                    <h1 style="font-family: 'Cairo', sans-serif; color: #ffffff; margin: 0;">
                        {{trans('subjects_trans.title')}}
                    </h1>
                </div> 
                
                <!-- top bar right -->
                <ul class="nav navbar-nav ml-auto"> 
                    <div class="btn-group mb-1">
                            <button type="button" style="background-color: rgba(164, 164, 164, 0.781); padding: 10px 20px; border-radius: 8px; text-align: center; display: inline-block;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ LaravelLocalization::getCurrentLocaleName() }}
                            @if (App::getLocale() == 'ar')
                                <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="Arabic Flag" style="width: 20px; height: 15px;">
                            @else
                                <img src="{{ URL::asset('assets/images/flags/GB.png') }}" alt="English Flag" style="width: 20px; height: 15px;">
                            @endif
                        </button>
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                    @if($localeCode == 'ar')
                                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="Arabic Flag" style="width: 20px; height: 15px;">
                                    @elseif($localeCode == 'en')
                                        <img src="{{ URL::asset('assets/images/flags/GB.png') }}" alt="English Flag" style="width: 20px; height: 15px;">
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div> 
                    
                    <li class="nav-item fullscreen">
                        <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen" style="color: rgb(0, 0, 0);"></i></a>
                    </li> 
                
                    <li class="nav-item dropdown mr-30"> 
                        <img src="{{ URL::asset('assets/images/Pharaoh.png') }}" width="55" height="65" alt="avatar">
                        {{-- </a> --}}
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="mt-0 mb-0">
                                            {{Auth::user()->name}} {{Auth::user()->Name}} 
                                        </h5>
                                        <span>{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>  
                                @if(auth('student')->check())
                                <form method="GET" action="{{ route('logout','student') }}">
                                @elseif(auth('teacher')->check())
                                    <form method="GET" action="{{ route('logout','teacher') }}">
                                @elseif(auth('parent')->check())
                                    <form method="GET" action="{{ route('logout','parent') }}">
                                @else
                                    <form method="GET" action="{{ route('logout','web') }}">
                                @endif
                                @csrf
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="text-danger ti-unlock"></i>
                                    {{trans('subjects_trans.Sign_out')}}
                                </a>
                            </form>
                        
                        </div>
                    </li>
                </ul>
            </nav>
            <!--================================= header End-->
    