@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Admin User <small>Add New</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i> Admin User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <!--<div class="panel-heading">Task</div>-->
                <div class="panel-body">
                    <!-- POST quote -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



        <form class="form-horizontal" action="{{ route('store_user') }}" method="POST"">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name: </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                </div>
            </div> 

            <div class="form-group">
                <label for="username" class="col-md-4 control-label">User Name: </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required />
                </div>
            </div> 

            <div class="form-group">
                <label for="password" class="col-md-4 control-label">Password: </label>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="password" name="password" value="" required />
                </div>
            </div> 

            <div class="form-group">
                <label for="confirmed" class="col-md-4 control-label">confirmed Password: </label>
                <div class="col-md-6">
                    <input type="confirmed" class="form-control" id="confirmed" name="confirmed" value="" required />
                </div>
            </div>            


            <div class="form-group">
                    <label for="admin_type" class="col-md-4 control-label">Admin Type: </label>
                    <div class="col-md-6">
                    <select name="admin_type" id="admin_type" class="form-control">
                        <option value="A">Admin</option>
                        <option value="SA">Super Admin</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user') }}" class="btn btn-default"> Cancel</a>
                </div>

            </div>
       </form>
      </div>
      </div>
</div>
</div>
</div>

    </div>
    <!--Color Picker JavaScript-->
   <!--  <script src="{{ asset('frontend/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/colors.js') }}"></script>
    <script src="{{ asset('frontend/js/jqColorPicker.js') }}"></script>
    <script type="text/javascript">
        $('.color').colorPicker();
    </script>
    <script src="{{ asset('frontend/js/index.js') }}"></script> -->
@endsection