<div class="wrapper boxed-wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo blue-bg">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="{{asset('images/mic_logo2.png')}}" alt=""  height="55"/></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="{{asset('images/mic_logo2.png')}}" alt="" height="55" /></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar blue-bg navbar-static-top">
            <!-- Sidebar toggle button-->
            <ul class="nav navbar-nav pull-left">
                <li>
                    <a class="sidebar-toggle" data-toggle="push-menu" href="#"></a>
                </li>
            </ul>
            <div class="pull-left search-box">
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages -->
                    {{-- <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <div class="notify">
                                <span class="heartbit"></span> <span class="point"></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 new messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/img1.jpg')}}" class="img-circle" alt="User Image" />
                                                <span class="profile-status online pull-right"></span>
                                            </div>
                                            <h4>Notification</h4>
                                            <p>I've finished it! See you so...</p>
                                            <p><span class="time">9:30 AM</span></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications  -->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <div class="notify">
                                <span class="heartbit"></span> <span class="point"></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left icon-circle red">
                                                <i class="icon-lightbulb"></i>
                                            </div>
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p>I've finished it! See you so...</p>
                                            <p><span class="time">9:30 AM</span></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">Check all Notifications</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- User Account  -->
                    <li class="dropdown user user-menu p-ph-res">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <img src="{{asset('dist/img/img1.jpg')}}" class="user-image" alt="User Image" /> --}}
                            <span class="hidden-xs">{{ ucfirst(Auth::user()->first_name) }}</span><i class="fa fa-chevron-circle-down ml-1" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu" style="padding-left: 15px;">
                            <li class="user-header">
                                <div class="pull-left user-img">
                                    {{-- <img src="{{asset('dist/img/avatar.png')}}" class="img-responsive img-circle" alt="User" /> --}}
                                </div>
                                <p class="text-left">
                                {{ ucfirst(Auth::user()->first_name) }} <small style="font-size: 8px;">{{ Auth::user()->email }}</small>
                                </p>
                            </li>
                            <!-- <li>
                                <a href="#"><i class="icon-profile-male"></i> My Profile</a>
                            </li> -->

                            <li role="separator" class="divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
