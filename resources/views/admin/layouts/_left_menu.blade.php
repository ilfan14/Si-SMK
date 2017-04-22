<ul id="menu" class="page-sidebar-menu">
    <li>
        <a href="{{ route('dashboard') }}">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li {!! (Request::is('home/users') || Request::is('home/users/create') || Request::is('home/users/*') || Request::is('home/deleted_users') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">User Profile</span>
            <span class="fa arrow"></span>
        </a>


        <ul class="sub-menu">

            <li {!! ((Request::is('home/users/*')) && !(Request::is('home/users/create')) ? 'class="active" id="active"' : '') !!}>
                    <a href="{{ URL::route('users.show', $iduser ) }}">
                        <i class="fa fa-angle-double-right"></i>
                        Profile Saya
                    </a>
            </li>

        @role('Admin')
            <li {!! (Request::is('home/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('home/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Daftar Users
                </a>
            </li>
        
        @endrole
        
    </ul>


    </li>



@include('admin/layouts/menu')
</ul>