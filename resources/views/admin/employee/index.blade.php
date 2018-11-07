@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Employee <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> Employee
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
                    <div class="row">
                        <div class="col-md-3 .col-md-offset-3">
                            <a href="{{ route('add_employee') }}"><i class="fa fa-plus"></i> Add </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Estate</th>
                                    <th>&nbsp;</th>
                                    <th style="width: 150px">&nbsp;</th>

                                </tr>
                            </thead>
                            <tbody>
                        @if (count($responses) > 0)
                            @foreach ($responses as $index => $response)
                                <tr>
                                    <td>{{ $response->employee_name }}</td>
                                    <?php
                                      if(!empty($response->estate_id)){
                                      $estate_name = App\Estate::where('estate_id', $response->estate_id)->first();
                                      if($estate_name){
                                        ?>
                                        <td>{{ $estate_name->estate_name  }}</td>
                                        <?php
                                      }else{
                                        ?>
                                        <td>Not Available</td>
                                        <?php
                                      }

                                      }
                                     ?>

                                    <td>
                                        <img src="{{ url('assets/images/employee/') }}/{{ $response->employee_image_path_name }}" width="99" height="127">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit_employee',['id' => $response->employee_id]) }}" class="btn btn-primary" role="button">Edit</a>

                                        <form action="{{route('delete_employee')}}" method="POST" class="pull-right">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

                                            <input type="hidden" name="employee_id" value="{{$response->employee_id}}" required>
                                            <input class="btn btn-danger btn_del" role="button" type="submit" value="Delete"/>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach
                        @else
                        <div class="alert alert-danger">
                            <p>No Employee to show.</p>
                        </div>
                        @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <div class="pagination"></div>
                        </div>
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
