@extends('layouts.app')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <h1 class="page-header">Video </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-user"></i> Video
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        @if(Session::has('success'))
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{ Session::get('success') }} <strong> Successful !!</strong>
                </div>
            </div>
        </div>
        @endif

        <div class="row">

            <div class="col-lg-8 col-md-offset-2">
                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Video</th>
                                <th>Video Name</th>
                                <th style="width: 150px">&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (count($responses) > 0)
                            @foreach ($responses as $response)
                            <tr>
                                <td style="width: 300px">
                                    <video width="200" height="100" controls>
                                        <source src="{!! url('/assets/images/signage/temp_images/') !!}/{{ $response->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td> 
                                <td style="width: 300px">{{ $response->video }}</td>  
                                <td style="text-align: center;width: 300px">                                        
                                    <form action="{{url('/admin/video/active')}}" method="POST" class="pull-right">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
                                        <input type="hidden" name="id" value="{{$response->id}}" required>
                                        @if($response->status == '1')
                                            <input class="btn btn-danger" role="button" name="active" type="submit" value="Deactive"/>
                                        @else
                                            <input class="btn btn-primary" role="button" name="active" type="submit" value="Active"/>
                                        @endif
                                    </form>
                                </td>

                            </tr>

                            @endforeach
                            @else
                        <div class="alert alert-danger">
                            <p>No Videos found.</p>
                        </div>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>



        </div><!-- /.row -->


    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection