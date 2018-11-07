<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('sb-admin/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        <style>
            .page_size {
                font-family: 'Source Serif Pro', serif;
                  
                margin: auto;
                float: none;
            }
            h1,small,h2{
                font-family: 'Source Serif Pro', serif;
            }
            p{
                margin-bottom: 0px;
            }
            .thumbnail .caption {
                padding: 3px;
                color: #333;
            }
            .thumbnail small {
                text-align: center;
                margin-left: 33%;
                font-weight: 700;
            }
            .thumbnail .caption {
                padding: 3px;
                color: #333;
                text-transform: uppercase;
            }
            .thumbnail .caption {
                padding: 3px;
                color: #333;
                text-transform: uppercase;
                font-size: 11px;
                font-weight: 600;
                background: lightyellow;
            }
            .thumbnail {
                position: relative;
                padding: 0px;
                margin-bottom: 20px;
            }

            .thumbnail img {
                width: 100%;
            }
            .thumbnail p {
                font-size: 16px;
            }
            .caption {
                height: 47px;
            }
            .smalltext {
                background-color: #ffdf95; height: 50px;
                padding: 5px;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .region-title {
                text-align: center;
                background-color: darkkhaki;
                margin: 0px;
                padding: 5px;
                border-radius: 6px;
                margin-bottom: 5px;
                font-weight: bolder;
            }
            h4.text-center.smalltext.ename {
                height: 30px;
                background-color: #ccc;
            }
        </style>

    </head>

    <body style="background-image: url('../../assets/images/signage/temp_images/sinage_background.png');background-repeat: no-repeat;height:100%; width:100%;background-size: 100%; background-color: #000;">

        <!-- Page Content -->
        <div class="container-fluid">


            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-7">
                    <img src="{!! url('/assets/images/signage/temp_images/boder1.png') !!}" style="margin-top: 30px;margin-left: 16px;">
                    <img src="{!! url('/assets/images/signage/temp_images/Hayleys_Logo.png') !!}" style=" width: 180px; margin-top: -195px;margin-left: 50px;">
                    <h1 style="margin-top: -160px;margin-left: 245px;font-weight: bold;" class="">BEST PROFIT PER HECTARE -
                        <small style="color: #292929">ESTATE / DIVISION</small>
                    </h1>
                    <div class="col-lg-12" style="margin-bottom: 45px;">
                        <img src="{!! url('/assets/images/signage/temp_images/KVPL_Logo.png') !!}" style=" width: 200px;margin-left: 4%;margin-top: 5%;margin-bottom: 0%">
                        <h2 style="margin-left: 46%;margin-top: -4%;font-weight: bold;"></h2>
                    </div>
                </div>
                <div class="col-lg-5"></div>
            </div>
            <!-- /.row -->


            <div class="row" style="">
                <div class="col-md-12 page_size">

                    @if (count($responsespl1) > 0)

                    @foreach ($responsespl1 as $value)
                    <?php $eManager = App\Employee::where('employee_id', $value->manager_id)->first(); ?>
                    <?php $regionName = App\Region::where('id', $value->region)->first(); ?>
                    <?php $estate = App\Estate::where('estate_id', $value->estate_id)->first(); ?>

                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="region-title">{{ $regionName->name }}</h4>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="thumbnail" >
                                            <h4 class="text-center smalltext ename" >Estate</h4>
                                            <h4 class="text-center smalltext" >{{$estate->estate_name}}</h4>
                                            <img src="{{ url('assets/images/employee/') }}/{{ $eManager->employee_image_path_name }}" width="99" height="127" alt="">
                                            <div class="caption">

                                                <p class="text-center"><?php echo App\Employee::namecrop($eManager->employee_name) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $dManager = App\Employee::where('employee_id', $value->division_manager_id)->first(); ?>
                                <?php $ddivision = App\Division::where('division_id', $value->division_id)->first(); ?>
                                <?php $destate = App\Estate::where('estate_id', $ddivision->estate_id)->first(); ?>

                                <div class="col-sm-6 ">
                                    <div class="row">
                                        <div class="thumbnail" >
                                            <h4 class="text-center smalltext ename" >Division</h4>
                                            <h4 class="text-center smalltext" >{{$destate->estate_name}} - {{$ddivision->division_name}}</h4>
                                            <img src="{{ url('assets/images/employee/') }}/{{ $dManager->employee_image_path_name }}" width="99" height="127" alt="">
                                            <div class="caption">

                                                <p class="text-center"><?php echo App\Employee::namecrop($dManager->employee_name) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                    @endif

                </div>

            </div>

        </div>

        <!-- Scripts -->
        <script src="{{ asset('sb-admin/js/jquery.min.js') }}"></script>
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

        <script src="{{ asset('sb-admin/js/bootstrap.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        <!-- <script src="{{ asset('sb-admin/js/plugins/morris/raphael.min.js') }}"></script>
        <script src="{{ asset('sb-admin/js/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('sb-admin/js/plugins/morris/morris-data.js') }}"></script> -->
    </body>
</html>
