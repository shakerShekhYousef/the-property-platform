<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="user-details">
            <div class="d-flex">
                <div class="me-2">
                    <img src="{{asset('assets/images/users/avatar-4.jpg')}}" alt=""
                         class="avatar-md rounded-circle">
                </div>
                <div class="user-info w-100">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Donald Johnson
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" class="dropdown-item"><i
                                        class="mdi mdi-account-circle text-muted me-2"></i>
                                    Profile<div class="ripple-wrapper me-2"></div>
                                </a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i
                                        class="mdi mdi-cog text-muted me-2"></i>
                                    Settings</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i
                                        class="mdi mdi-lock-open-outline text-muted me-2"></i>
                                    Lock screen</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i
                                        class="mdi mdi-power text-muted me-2"></i>
                                    Logout</a></li>
                        </ul>
                    </div>

                    <p class="text-white-50 m-0">Administrator</p>
                </div>
            </div>
        </div>


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{ __('home.main') }}</li>
                 <!-- Left Menu profile -->
                <li>
                    <a href="{{route('profile', Auth::user()->id)}}">
                        <i class="mdi mdi-file-document-multiple"></i>
                        <span>{{ __('sidebar.users.profile') }}</span>
                    </a>
                   
                </li>
                 <!-- Left Menu user -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-document-multiple"></i>
                        <span>{{ __('sidebar.users.main') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('creat')}}">{{ __('sidebar.users.create') }}</a></li>
                        <li><a href="{{route('index')}}">{{ __('sidebar.users.list') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-document-multiple"></i>
                        <span>{{ __('sidebar.leads.main') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{route('leads.pool')}}">
                            {{ __('sidebar.leads.list') }}</a>
                        </li>
                        <li><a href="{{route('leads.create')}}">{{ __('sidebar.leads.create') }}</a></li>
                        <li><a href="{{ route('leads.import') }}">{{ __('sidebar.leads.import') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-document-multiple"></i>
                        <span>{{ __('sidebar.properties.main') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('properties_list')}}">{{ __('sidebar.properties.list') }}</a></li>
                        <li><a href="{{route('properties.create')}}">{{ __('sidebar.properties.create') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-document-multiple"></i>
                        <span>Tenants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('tenants_list')}}">Tenants List</a></li>
                        <li><a href="{{route('tenants.create')}}">Create a Tenant</a></li>
                    </ul>
                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
