@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">
                            Employee <small>Edit : {{ $responses->client_name }}</small>
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



        <form class="form-horizontal" action="{{ route('manage_url_update') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="client_name" class="col-md-4 control-label">Client Name: </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $responses->client_name }}" required />
                </div>
            </div>
                     
            <div class="form-group">
                <label for="url" class="col-md-4 control-label">URL: </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="url" name="url" value="{{ $responses->url }}" required />
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
                    <a href="{{ route('manage_url') }}" class="btn btn-default"> Cancel</a>
                </div>

            </div>
            <input type="hidden" name="url_id" value="{{ $responses->url_id }}">

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