<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm-dark.png')}}" alt="" height="22">
                            </span>
                    <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="24">
                            </span>
                </a>
                <a href="{{route('home')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm-light.png')}}" alt="" height="22">
                            </span>
                    <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="24">
                            </span>
                </a>
            </div>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- User -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-4.jpg')}}"
                         alt="Header Avatar">
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('profile', Auth::user()->id)}}"><i
                            class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                        <span>Profile</span></a>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-wallet font-size-16 align-middle text-muted me-2"></i>
                        <span>My Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span
                            class="badge bg-success float-end">11</span><i
                            class="mdi mdi-wrench font-size-16 align-middle text-muted me-2"></i>
                        <span>Settings</span></a>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-lock-open-outline font-size-16 text-muted align-middle me-2"></i>
                        <span>Lock screen</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-primary" href="/out"><i
                            class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                        <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
