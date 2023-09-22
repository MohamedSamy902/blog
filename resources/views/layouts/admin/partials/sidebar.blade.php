<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
        </a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    @can('role')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('/dashboard') }}" href="javascript:void(0)"><i
                                    data-feather="home"></i><span>role</span></a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/dashboard') }};">
                                <li><a href="{{ route('roles.index') }}" class="{{ routeActive('index') }}">role List</a>
                                </li>
                                @can('add-role')
                                    <li><a href="{{ route('roles.create') }}" class="{{ routeActive('roles.create') }}">Add
                                            Role</a></li>
                                @endcan

                            </ul>
                        </li>
                    @endcan
                    @can('user')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('/dashboard') }}" href="javascript:void(0)"><i
                                    data-feather="home"></i><span>User</span></a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/dashboard') }};">
                                <li><a href="{{ route('users.index') }}" class="{{ routeActive('index') }}">Users List</a>
                                </li>
                                @can('add-role')
                                    <li><a href="{{ route('users.create') }}" class="{{ routeActive('users.create') }}">Add
                                            User</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
