<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title> @section('title')
            | SI-SMK
        	@show 
    </title>




    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]--}}
    {{-- global css --}}

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
    {{-- font Awesome --}}

    {{-- end of global css --}}
    {{--page level css--}}
@yield('header_styles')
            {{--end of page level css--}}

<body class="skin-josh">
<header class="header">
    <a href="{{ route('dashboard') }}" class="logo">
    	<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
    </a>


	</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar ">
            <div class="page-sidebar  sidebar-nav">
                <!-- <div class="nav_icons">
                    <ul class="sidebar_threeicons">
                        <li>
                            <a href="link to form builder">
                                <i class="livicon" data-name="hammer" title="Form Builder 1" data-loop="true"
                                   data-color="#42aaca" data-hc="#42aaca" data-s="25"></i>
                            </a>
                        </li>
                        <li>
                            <a href="link to form builder">
                                <i class="livicon" data-name="list-ul" title="Form Builder 2" data-loop="true"
                                   data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                            </a>
                        </li>
                        <li>
                            <a href="link to form builder">
                                <i class="livicon" data-name="vector-square" title="Button Builder" data-loop="true"
                                   data-color="#f6bb42" data-hc="#f6bb42" data-s="25"></i>
                            </a>
                        </li>
                        <li>
                            <a href="link to form builder">
                                <i class="livicon" data-name="new-window" title="Form Builder 1" data-loop="true"
                                   data-color="#37bc9b" data-hc="#37bc9b" data-s="25"></i>
                            </a>
                        </li>
                    </ul>
                </div> -->
                <div class="clearfix"></div>
                <!-- BEGIN SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
        </section>
    </aside>
    <aside class="right-side">

        <!-- Notifications -->

                <!-- Content -->
        @yield('content')

    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->

    <!-- <script src="http://code.jquery.com/jquery-3.2.1.js"></script> -->

<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}"></script>



<!-- end of global js -->
<!-- begin page level js -->
@yield('footer_scripts')
        <!-- end page level js -->
</body>
</html>
