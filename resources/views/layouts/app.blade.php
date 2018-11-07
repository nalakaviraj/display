<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Signage') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('sb-admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('sb-admin/css/sb-admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

   
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       
        <!-- Fonts -->
        <!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
        <link href="{{ asset('sb-admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
       <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Hayleys Signage</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- <a href="/auth/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a> -->
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">
                    {{-- <li class={{ (Request::is('dashboard')) ?  "active":"" }} >
                        <a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li> --}}
                     <li class={{ (Request::is('admin/employee')) ?  "active":"" }} >
                        <a href="{{ route('employee') }}"><i class="fa fa-fw fa-users"></i> Employee</a>
                    </li>
                  @if(Auth::user()->admin_type == 'SA')
                    <li class={{ (Request::is('admin/manage_url*')) ?  "active":"" }} >
                        <a href="{{ route('manage_url') }}"><i class="fa fa-fw fa-info-circle"></i> Manage URL </a>

                    </li>
                    <li class={{ (Request::is('admin/schedule*')) ?  "active":"" }} >
                        <a href="{{ route('schedule') }}"><i class="fa fa-fw fa-briefcase"></i> Schedules</a>
                    </li>
                  @endif

                    <li class={{ (Request::is('admin/pro_report*')) ?  "active":"" }} >

                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-line-chart"></i> Performance Report <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li >
                                <a href="{{ url('/admin/pro_report/highestyph/add/KVPL') }}">Highest YPH</a>
                            </li>
                            <!--<li >-->
                            <!--    <a href="{{ url('/admin/pro_report/bestyphrankimprovement/add/KVPL') }}">Best YPH Rank Improvement</a>-->
                            <!--</li>-->
                            <li >
                                <a href="{{ url('/admin/pro_report/highestrevenueperhect/add/KVPL') }}">Highest VP YPH </a>
                            </li>
                            <li >
                                <a href="{{ url('/admin/pro_report/bestimprovementinrank/add/KVPL') }}">Best Improvement In VP Rank</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/pro_report/bestprofitperhect/add/KVPL') }}">Best Profit Per HECT</a>
                            </li>
                            <li >
                                <a href="{{ url('/admin/pro_report/bestimprovementinrankteafactory/add/KVPL') }}">Best Improvement in Rank Tea Factories</a>
                            </li>
                            
                            <li >
                                <a href="{{ url('/admin/pro_report/bestimprovementonprofitperhect/add/KVPL') }}">Best Improvement Onprofit Per HECT</a>
                            </li>
                            <li >
                                <a href="{{ url('/admin/pro_report/alltimerecordprices/add/KVPL') }}">All Time Record Prices</a>
                            </li>
                            <li >
                                <a href="{{ url('/admin/pro_report/topprice/add/KVPL') }}">Top Prices</a>
                            </li>
                        </ul>


                    </li>
                     <li class={{ (Request::is('admin/video*')) ?  "active":"" }}>
                        <a href="{{ url('/admin/video') }}"><i class="fa fa-fw fa-video-camera"></i> Video</a>
                    </li>
                    @if(Auth::user()->admin_type == 'SA')
                     <li class={{ (Request::is('admin/user*')) ?  "active":"" }}>
                        <a href="{{ route('user') }}"><i class="fa fa-fw fa-user"></i> User</a>
                    </li>
                    @endif
                    <!-- <li class={{ (Request::is('admin/contact*')) ?  "active":"" }}>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-envelope-o"></i> Contact <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/admin/contact">Contact Us</a>
                            </li>
                            <li >
                                <a href="/admin/contactform">Contact Form</a>
                            </li>
                        </ul>
                    </li> -->



                </ul>

                 @endif
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

        <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

    <script type="text/javascript">
      var base_url = '{!! url('') !!}';
      var _token =  "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/cropit.js') }}"></script>
    <script src="{{ asset('js/jquery.newsTicker.min.js') }}"></script>
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" ></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>
<script>
    $(document).ready(function () {
        $(function () {
            $('.image-editor').cropit();

            $('form').submit(function () {
                // Move cropped image data to hidden input
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
//
//                // Print HTTP request params
                var formValue = $(this).serialize();
                $('#result-data').text(formValue);
//
//                // Prevent the form from actually submitting
//                return false;
            });
        });
        
        
    });
</script>
    <!-- Morris Charts JavaScript -->
<!--     <script src="{{ asset('sb-admin/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/plugins/morris/morris-data.js') }}"></script> -->
</body>
</html>
