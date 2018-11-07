@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Schedule <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> Schedule
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

                <div class="col-lg-4 col-md-offset-2">
                    
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    
                                    <th width="60%">Screen Name</th>
                                    <th width="20%"></th>          

                                </tr>
                            </thead>
                            <tbody>

                            @foreach($clientscreens as $clientscreen)
                     
                                <tr>
                                    <td>{{ $clientscreen->screen_name }}</td>                                   

                                    <td> <a href="{{ route('view_screen_schedule',['screen_id' => $clientscreen->id]) }}" class="btn btn-info">Add Schedule</a> </td>    
                                </tr>
                               
                            @endforeach
                            

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