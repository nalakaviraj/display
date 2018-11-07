<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('sb-admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ url('js/') }}/jquery.cropit.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .page_size {
                width: 100% !important;
                margin: auto;
                float: none;
                padding:40px;
            }
            iframe#screen{
                width:100%;
                height: 1080px;
            }
            .col-md-12.page_size {
                padding-left: 40px;
                padding-top: 40px;
            }

        </style>
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
        <script>
$(document).ready(function () {

    $.ajax({url: "{!! url('/geturl') !!}?screen_id=1", success: function (result) {
            urls = result;
            $("#screen").attr("src", "<?php echo url('/') ?>" + urls + "");

            if (urls == '/signage/apex_logo/img3' 
                || urls == '/signage/apex_logo/img2' 
                || urls == '/signage/firstpage' 
                || urls == '/signage/second'
                || urls == '/signage/mar1'
                || urls == '/signage/mar2'
                || urls == '/signage/mar3'
                || urls == '/signage/mar4'
                || urls == '/signage/mar5'
                || urls == '/signage/mar6'
                || urls == '/signage/mar7'
                || urls == '/signage/mar8'
                || urls == '/signage/mar9'
                || urls == '/signage/mar10'
                || urls == '/signage/mar11'
                || urls == '/signage/mar12'
                || urls == '/signage/mar13'
                || urls == '/signage/mar14'
                || urls == '/signage/mar15'
                || urls == '/signage/mar17'
                || urls == '/signage/mar18'
                || urls == '/signage/mar19'
                || urls == '/signage/mar16'
            ) {
                
                $('#videos').get(0).pause();
                $('#videos').hide();
            } else {
                
                $('#videos').get(0).pause();
                $('#videos').hide();
            }

        }});

    setInterval(function () {
        var urls;
        $.ajax({url: "{!! url('/geturl') !!}?screen_id=1", success: function (result) {
                urls = result;
                $("#screen").attr("src", "<?php echo url('/') ?>" + urls + "");

                if (urls == '/signage/apex_logo/img3' 
                || urls == '/signage/firstpage' 
                || urls == '/signage/second'
                || urls == '/signage/apex_logo/img2'
                || urls == '/signage/mar1'
                || urls == '/signage/mar2'
                || urls == '/signage/mar3'
                || urls == '/signage/mar4'
                || urls == '/signage/mar5'
                || urls == '/signage/mar6'
                || urls == '/signage/mar7'
                || urls == '/signage/mar8'
                || urls == '/signage/mar9'
                || urls == '/signage/mar10'
                || urls == '/signage/mar11'
                || urls == '/signage/mar12'
                || urls == '/signage/mar13'
                || urls == '/signage/mar14'
                || urls == '/signage/mar15'
                || urls == '/signage/mar18'
                || urls == '/signage/mar19'
                || urls == '/signage/mar17'
                || urls == '/signage/mar16') {
                    
                    $('#videos').get(0).pause();
                    $('#videos').hide();
                } else {
                    
                    $('#videos').get(0).play();
                    $('#videos').show();
                }

            }});
    }, 30000);

});
        </script>

        <script>
            $(document).ready(function () {
                var marquee = $('div.marquee');
                marquee.each(function () {
                    var mar = $(this), indent = mar.width();
                    mar.marquee = function () {
                        indent--;
                        mar.css('text-indent', indent);
                        if (indent < -1 * mar.children('div.marquee-text').width()) {
                            indent = mar.width();
                        }
                    };
                    mar.data('interval', setInterval(mar.marquee, 1000 / 60));
                });
            });
        </script>

        <style>
            div.marquee {
                white-space:no-wrap;
                overflow:hidden;
            }
            div.marquee > div.marquee-text {
                white-space:nowrap;
                display:inline;
                width:auto;
            }
            .marquee {
                background-color: #0e0e0e;
                padding: 10px 0px 10px 0px;
                color: #fff;
                font-weight: 800;
                font-size: 20px;
            }
            /*
            -webkit-box-shadow: 0px 0px 36px 2px rgba(0,0,0,1);
            -moz-box-shadow: 0px 0px 36px 2px rgba(0,0,0,1);
            box-shadow: 0px 0px 36px 2px rgba(0,0,0,1);
            */
        </style>

    </head>
    <body id="bg" bgcolor="#E6E6FA"  style="overflow:hidden;background-color:#000">
        <!--<body bgcolor="#000000"> height="730" width="1330"-->
    <center>
       <!-- <div class="containers" style="position: fixed;right: 25px;margin-top: 8px;">
        <video id="videos" width="380" height="240"style="background-color: #104f02;" >
                    <source src="" type="video/mp4" autoplay loop>
                    Your browser does not support the video tag.
        </video>
        </div>-->
        <!--1920 1080-->
        <iframe id="screen" frameborder="0" src="" marginwidth="0" marginheight="0" scrolling="no" >
            
        </iframe>
    </center>
</body>
</html>
