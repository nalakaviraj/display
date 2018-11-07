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
                                <i class="fa fa-info-circle"></i> <a href="{{ route('schedule') }}"> Schedule </a> / {{ $clientscreen->screen_name }}
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
                            <a href="{{ route('view_screen_schedule_update',['screen_id' => $clientscreen->id ]) }}"><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 105px">Schedule ID</th>
                                    <th>Currently Assigned URL</th>
                                    <th>Select a Client</th>          

                                </tr>
                            </thead>
                            <tbody>
                        @if (count($responses) > 0)
                            @foreach ($responses as $index => $response)
                                <tr>
                                    <td>{{ $response->screen_schedule_id }}</td>

                                    <?php $somedata = App\ClientUrl::where('url_id', $response->client_url_id)->first() ?>

                                    <td id="sid_{{ $screen_id }}_{{ $response->screen_schedule_id }}"">{{ $somedata->client_name }}</td>
                                    <td>
                                        <select name="" class="form-control schedule_client_name">
                                            @foreach ($clienturls as $index => $clienturl) 
                                                <option value="{{ $clienturl->url_id }}" {{ ($response->client_url_id == $clienturl->url_id) ? 'selected':'' }}>{{ $clienturl->client_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="screen_schedule_id" ="" value="{{ $response->screen_schedule_id }}">
                                        <input type="hidden" class="screen_id" ="" value="{{ $screen_id }}">
                                    </td>
                                    
                                    

                                </tr>

                            @endforeach
                        @else
                        <div class="alert alert-danger">
                            <p>No Schedules to show.</p>
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