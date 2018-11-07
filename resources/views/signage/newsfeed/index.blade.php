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
            ul#nt-example1 {
                
                margin: 30px;
                margin-top: 80px;
                padding:20px;
                font-size: 26px;
            }
            ul#nt-example1 li {
                border-radius: 10px;
                margin-top: 30px;
                margin-bottom: 30px;
                background: #ccc;
                padding:20px;
                list-style: none;
                box-shadow: 2px 2px 6px 1px;
            }
        </style>

    </head>

    <body style="background-image: url('../../public/assets/images/signage/temp_images/sinage_background.png'); background-color: #000;">

        <!-- Page Content -->
        <div class="container-fluid">


            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <img src="{!! url('/assets/images/signage/temp_images/boder1.png') !!}" style="margin-top: 30px;margin-left: 16px;">
                    <img src="{!! url('/assets/images/signage/temp_images/Hayleys_Logo.png') !!}" style=" width: 180px; margin-top: -195px;margin-left: 50px;">
                    <h1 style="margin-top: -127px;margin-left: 245px;font-weight: bold;" class="">News Feed</h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row" style="">
                <div class="col-md-12 page_size">
                    @if (count($responses) > 0)
                    <div id="nt-example1-container"  style=" margin-top: 165px;" >
                        <ul class="nt-example1" id="nt-example1" style="height: 161px;padding-left: 0px;">
                            @foreach ($responses as $value)
                            <li>{{$value->news}}</li>    
                            @endforeach
                        </ul>
                    </div>
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
    row_height: 161,
    max_rows: 2,
    duration: 5000,
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
