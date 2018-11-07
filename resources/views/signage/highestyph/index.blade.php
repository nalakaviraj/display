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
       
</head>

<body style="background-image: url('../assets/images/signage/temp_images/sinage_background.png');background-repeat: no-repeat;height:100%; width:100%;background-size: 100%; background-color: #111111;">

<!-- Page Content -->
    <div class="container-fluid">
    	

    	<!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <img src="{!! url('/assets/images/signage/temp_images/boder1.png') !!}" style="margin-top: 30px;margin-left: 16px;">
                <img src="{!! url('/assets/images/signage/temp_images/Hayleys_Logo.png') !!}" style=" width: 180px; margin-top: -195px;margin-left: 50px;">
                <h1 style="margin-top: -127px;margin-left: 245px;font-weight: bold;" class="">HIGHEST YPH - 
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


        <div class="row" style="margin-left: 10px;">
    		<div class="col-lg-12">
		        @if (count($responses) > 0)
		            @foreach ($responses as $index => $response)

		            @if($index%10 == 0)
		                <div class="row">
		            @endif

		            <?php $somedata = App\Employee::where('employee_id',$response->employee_id)->first(); ?>

		            <?php //var_dump($somedata->employee_image_path_name); ?>
		             @if ($somedata->plantation_id == 2 )
		            		<div class="col-md-1 portfolio-item center-block">
			            		<div class="thumbnail" style="width: 90px;">
			            			<a href="#">
					                    <img class="img-responsive" src="{!! url( $somedata->employee_image_path_name) !!}" width="99" height="127" alt="">
					                </a>
					                <div class="caption">
		                                <p class="text-center">{{  $somedata->employee_name }}</p>
		                            </div>
			            		</div>
		            		</div>
		           	@endif

		            @if(($index+1)%10 == 0)
		                </div>
		            @endif
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

        		<!-- Projects Row -->
            	<div class="row" style="margin-left: 10px;margin-top: 20px">
            		<div class="col-lg-12">
				        @if (count($responses) > 0)
				            @foreach ($responses as $index => $response)

				            @if($index%10 == 0)
				                <div class="row">
				            @endif

				            <?php $somedata = App\Employee::where('employee_id',$response->employee_id)->first(); ?>

				            <?php //var_dump($somedata->employee_image_path_name); ?>
				             @if ($somedata->plantation_id == 1 )
				            		<div class="col-lg-1 portfolio-item">
					            		<div class="thumbnail" style="width: 90px;">
					            			<a href="#">
							                    <img class="img-responsive" src="{!! url( $somedata->employee_image_path_name) !!}" width="120" height="140" alt="">
							                </a>
							                <div class="caption">
				                                <p class="text-center center-block">{{  $somedata->employee_name }}</p>
				                            </div>
					            		</div>
				            		</div>
				           	@endif

				            @if(($index+1)%10 == 0)
				                </div>
				            @endif
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
