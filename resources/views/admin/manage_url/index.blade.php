@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Manage URL <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> Manage URL
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
                            <a href="{{ route('manage_url_add') }}"><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>URL</th>                                    
                                    <th style="width: 150px;">&nbsp;</th>

                                </tr>
                            </thead>
                            <tbody>
                        @if (count($responses) > 0)
                            @foreach ($responses as $index => $response)
                                <tr>
                                    <td>{{ $response->client_name }}</td>
                                    <td>{{ $response->url }}</td>
                                    
                                    <td>
                                        <a href="{{ route('manage_url_edit',['id' => $response->url_id]) }}" class="btn btn-primary" role="button">Edit</a>
                                        <!--<a href="/admin/users/change_password/{{$response->id}}" class="btn btn-warning" role="button">Change Password</a>-->
                                        <!-- <a href="/admin/users/delete/{{$response->id}}" class="btn btn-danger" role="button">Delete</a> -->
                                        
                                        <form action="{{route('manage_url_delete')}}" method="POST" class="pull-right">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

                                            <input type="hidden" name="url_id" value="{{$response->url_id}}" required>
                                            <input class="btn btn-danger btn_del" role="button" type="submit" value="Delete"/>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach
                        @else
                        <div class="alert alert-danger">
                            <p>No URLs to show.</p>
                        </div>
                        @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <div class="pagination"> {!! $responses->render() !!} </div>
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