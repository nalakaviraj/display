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
                    padding:40px;
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
            .caption.captions.clearfix {
                height: 207px;
                overflow: hidden;
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
            .thumbnail img {
                width: 85%;
            }
            h4.text-center.smalltext.ename {
                height: 30px;
                background-color: #ccc;

            }
            #nt-example1 li {
                
                color: #4e4e4e;
                background: #F2F2F2;
                overflow: hidden;
                height: 40px;
                padding: 10px;
                line-height: 30px;
                list-style: none;
                font-size: 20px;
                text-align: left;
                border-bottom: 1px dotted #2c8162;
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
                    <img src="{!! url('/assets/images/signage/temp_images/Hayleys_Logo.png') !!}" style=" width: 180px; margin-top: -210px;margin-left: 45px;">
                    <h1 style="margin-top: -160px;margin-left: 235px;font-weight: bold;" class="">BEST IMPROVEMENT IN RANK </br> TEA FACTORIES 
                        <small style="color: #292929"></small>
                    </h1>
                    <div class="col-lg-12" style="margin-bottom: 50px;">
                        <img src="{!! url('/assets/images/signage/temp_images/KVPL_Logo.png') !!}" style=" width: 200px;margin-left: 4%;margin-top: 30px;">
                        <h2 style="margin-left: 46%;margin-top: -60px;font-weight: bold;"></h2>
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
                                        <div class="thumbnail" >
                                            <h4 class="text-center smalltext" >{{$estate->estate_name}}</h4>
                                            <img src="{{ url('assets/images/employee/') }}/{{ $eManager->employee_image_path_name }}"  style="width:50%" width="99" height="127" alt="">
                                            <div class="caption">
                                                <p class="text-center">{{  $eManager->employee_name }}</p>
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
        <script src="{{ asset('js/jquery.newsTicker.min.js') }}"></script>
        <script>
var nt_example1 = $('.nt-example1').newsTicker({
    row_height: 40,
    max_rows: 5,
    duration: 2000,
    prevButton: $('#nt-example1-prev'),
    nextButton: $('#nt-example1-next')
});
        </script>
        <!-- Morris Charts JavaScript -->
        <!-- <script src="{{ asset('sb-admin/js/plugins/morris/raphael.min.js') }}"></script>
        <script src="{{ asset('sb-admin/js/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('sb-admin/js/plugins/morris/morris-data.js') }}"></script> -->
    </body>
</html>
