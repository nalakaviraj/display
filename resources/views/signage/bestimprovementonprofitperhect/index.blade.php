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
    <style>
    .page_size {
        
      margin: auto;
      float: none;
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
}
    </style>

</head>

<body style="background-image: url('../assets/images/signage/temp_images/sinage_background.png');background-repeat: no-repeat;height:100%; width:100%;background-size: 100%; background-color: #000;">

<!-- Page Content -->
    <div class="container-fluid">


    	<!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <img src="{!! url('/assets/images/signage/temp_images/boder1.png') !!}" style="margin-top: 30px;margin-left: 16px;">
                <img src="{!! url('/assets/images/signage/temp_images/Hayleys_Logo.png') !!}" style=" width: 180px; margin-top: -195px;margin-left: 50px;">
                <h1 style="margin-top: -127px;margin-left: 245px;font-weight: bold;" class="">BEST IMPROVEMENT ON PROFIT PER HECT -
                    <small style="color: #292929">ESTATE / DIVISION</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <img src="{!! url('/assets/images/signage/temp_images/TTEL_Logo.png') !!}" style="width: 90px;margin-left: 38%;margin-top: 5%;">
                <h2 style="margin-left: 46%;margin-top: -3%;font-weight: bold;">THALAWAKELLE</h2>
            </div>
        </div>


        <div class="row" style="">
    		<div class="col-md-12 page_size">

		        @if (count($responsespl1) > 0)

                @foreach ($responsespl1 as $value)
                  <?php $eManager = App\Employee::where('employee_id',$value->manager_id)->first(); ?>

                  <div class="col-lg-3">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                          <div class="row">
                          <div class="thumbnail" >
                              <h4 class="text-center smalltext" >Estate</h4>
                            <img src="{{ url('assets/images/employee/') }}/{{ $eManager->employee_image_path_name }}" width="99" height="127" alt="">
                            <div class="caption">
                              <p class="text-center">{{  $eManager->employee_name }}</p>
                            </div>
                          </div>
                          </div>
                        </div>

  <?php $dManager = App\Employee::where('employee_id',$value->division_manager_id)->first(); ?>
                        <div class="col-sm-6 ">
                          <div class="row">
                          <div class="thumbnail" >
                              <h4 class="text-center smalltext" >Division </h4>
                            <img src="{{ url('assets/images/employee/') }}/{{ $dManager->employee_image_path_name }}" width="99" height="127" alt="">
                            <div class="caption">
                              <p class="text-center">{{  $dManager->employee_name }}</p>
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




        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <img src="{!! url('/assets/images/signage/temp_images/KVPL_Logo.png') !!}" style="width: 90px;margin-left: 38%;margin-top: -1%;">
                <h2 style="margin-left: 46%;margin-top: -2%;font-weight: bold;">KELANI  VALLEY</h2>
            </div>
        </div>
        <!-- /.row -->

        <div class="row" style="">
        <div class="col-md-12 page_size">

            @if (count($responsespl2) > 0)

                @foreach ($responsespl2 as $value)
                  <?php $eManager = App\Employee::where('employee_id',$value->manager_id)->first(); ?>

                  <div class="col-lg-3">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                          <div class="row">
                          <div class="thumbnail" >
                            <small class="text-center" >Estate</small>
                            <img src="{{ url('assets/images/employee/') }}/{{ $eManager->employee_image_path_name }}" width="99" height="127" alt="">
                            <div class="caption">
                              <p class="text-center">{{  $eManager->employee_name }}</p>
                            </div>
                          </div>
                          </div>
                        </div>

  <?php $dManager = App\Employee::where('employee_id',$value->division_manager_id)->first(); ?>
                        <div class="col-sm-6 ">
                          <div class="row">
                          <div class="thumbnail" >
                            <small class="text-center" >Division</small>
                            <img src="{{ url('assets/images/employee/') }}/{{ $dManager->employee_image_path_name }}" width="99" height="127" alt="">
                            <div class="caption">
                              <p class="text-center">{{  $dManager->employee_name }}</p>
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
<!--     <script src="{{ asset('sb-admin/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/plugins/morris/morris-data.js') }}"></script> -->
</body>
</html>
