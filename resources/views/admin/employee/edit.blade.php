@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Employee <small>Edit : {{ $responses->employee_name }}</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i> Employee
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



        <form class="form-horizontal" action="{{ route('update_employee') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="employee_name" class="col-md-4 control-label">Employee Name: </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $responses->employee_name }}" required />
                </div>
            </div>
            <div class="form-group">
                <label for="plantation_id" class="col-md-4 control-label">Plantation</label>
                <div class="col-md-6">
                    <!-- <input type="text" class="form-control" id="h1_title" name="h1_title" value="{{ old('vHeading') }}" required /> -->
                    <select class="form-control" id="plantation_id" name="plantation_id">
                        @foreach ($plantations as $plantation)
                            <option value="{{ $plantation->plantation_id }}" {{ ($plantation->plantation_id == $responses->plantation_id) ? 'selected':''  }} >{{ $plantation->plantation_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="estate_id" class="col-md-4 control-label">Estate</label>
                <div class="col-md-6">
                    <!-- <input type="text" class="form-control" id="h1_title" name="h1_title" value="{{ old('vHeading') }}" required /> -->
                    <select class="form-control" id="estate_id" name="estate_id">
                        @foreach ($estates as $estate)
                            <option value="{{ $estate->estate_id }}" {{ ($estate->estate_id == $responses->estate_id) ? 'selected':''  }}>{{ $estate->estate_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="user_type_id" class="col-md-4 control-label">User Type</label>
                <div class="col-md-6">
                    <!-- <input type="text" class="form-control" id="h1_title" name="h1_title" value="{{ old('vHeading') }}" required /> -->
                    <select class="form-control" id="user_type_id" name="user_type_id">
                        @foreach ($userTypes as $userType)
                            <option value="{{ $userType->user_type_id }}" {{ ($userType->user_type_id == $responses->user_type_id) ? 'selected':''  }} >{{ $userType->type_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            
            <div class="form-group">
                <label for="estate_id" class="col-md-4 control-label">Division</label>
                <div class="col-md-6">
                    <!-- <input type="text" class="form-control" id="h1_title" name="h1_title" value="{{ old('vHeading') }}" required /> -->
                    <select class="form-control" id="division_id" name="division_id">
                        @foreach ($divisions as $division)
                            <option value="{{ $division->division_id }}" {{ ($division->division_id == $responses->estate_id) ? 'selected':''  }}>{{ $division->division_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Upload Image: </label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" id="image" name="image"/>
                </div>
            </div>            
            

            <div class="form-group">
                    <label for="enable" class="col-md-4 control-label">Enable: </label>
                    <div class="col-md-6">
                    <select name="enable" id="enable" class="form-control">
                        <option value="1" {{ ($responses->enable == 1) ? 'selected':'' }}>Enable</option>
                        <option value="0" {{ ($responses->enable == 0) ? 'selected':'' }}>Disable</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('employee') }}" class="btn btn-default"> Cancel</a>
                </div>

            </div>
            <input type="hidden" name="employee_id" value="{{ $responses->employee_id }}">

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