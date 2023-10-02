
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center">
                {{-- <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image" /> --}}
            </div>
            <div class="info">
                <p>{{ ucfirst(Auth::user()->first_name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">PERSONAL</li>
            <li class="{{ (request()->is('dashboard')) ? 'active':''  }}">
                <a href="{{route('dashboard')}}">
                    <i class="icon-home"></i> <span>Dashboard</span>

                </a>
            </li>

            <li class="{{ (request()->is('dashboard/user')) || (request()->is('dashboard/user/*')) ? 'active':'' }}">
                <a href="{{route('user.index')}}">
                    <i class="icon-home"></i> <span>User Management</span>

                </a>
            </li>

            <li class="{{(request()->is('dashboard/artist')) || (request()->is('dashboard/artist/*')) ? 'active':'' }}">
                <a href="{{route('artist.index')}}">
                    <i class="icon-home"></i> <span>Artist Management</span>

                </a>
            </li>

            <li class="{{(request()->is('dashboard/music')) || (request()->is('dashboard/music/*')) ? 'active':'' }}">
                <a href="{{route('music.index')}}">
                    <i class="icon-home"></i> <span>Music Management</span>

                </a>
            </li>
             
              <!-- <li class="treeview "> <a href="#"> <i class="icon-cms"></i> <span>CMS</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{ url('') }}">
                            <i class="icon-book-open"></i> <span>Management</span>
                        </a>
                    </li>
                                         
                </ul>
            </li> -->
           
         
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
