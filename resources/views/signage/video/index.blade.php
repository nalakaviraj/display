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
        
        <script>
            
            function setDeceleratingTimeout(callback, factor, times)
            {
                var internalCallback = function (tick, counter) {
                    return function () {
                        if (--tick >= 0) {
                            window.setTimeout(internalCallback, ++counter * factor);
                            callback();
                        }
                    }
                }(times, 0);

                window.setTimeout(internalCallback, factor);
            };
            
            function videochange(videos){
                 $("#videos").attr("src", "<?php echo url('/assets/images/signage/temp_images/') ?>/" + videos + "");
                 
                 var vid = document.getElementById("videos");
                vid.autoplay = true;
                vid.loop = true;
                vid.load();
            }
            
            <?php
            if (count($videos) > 0) {
                $total_time = 0;
                $x = 1;
                foreach ($videos as $video) {
                    //$total_time = $total_time + $video->time;
                    
                    
                    if($x == 1){
                        
                        echo "setDeceleratingTimeout(function () {"
                    . "videochange('" . $video->video . "');"
                    . "}, " . 0 . ", 1); \n";
                        $total_time = $video->time;
                        
                    }else{
                        
                        echo "setDeceleratingTimeout(function () {"
                    . "videochange('" . $video->video . "');"
                    . "}, " . $total_time . ", 1); \n";
                        $total_time += $video->time;
                    }
                    
                    $x++;
                }
            }else{
                echo "asd";
            }
            ?>
        </script>
            
        
    </head>

    <body style="background-color: rgba(255, 255, 255, 0);" >

        <video id="videos" width="340" height="200"style="background-color: #104f02;" >
                    <source src="" type="video/mp4" autoplay loop>
                    Your browser does not support the video tag.
        </video>

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
