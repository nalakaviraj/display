@extends('layouts.app')

@section('content')
<style>
    .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 200px;
        height: 256px;
    }

    .cropit-preview-image-container {
        cursor: move;
    }

    .image-size-label {
        margin-top: 10px;
    }

    input {
        display: block;
    }

    button[type="submit"] {
        margin-top: 10px;
    }

    #result {
        margin-top: 10px;
        width: 900px;
    }

    #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
    }
</style>  



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <h1 class="page-header">
                    News Feed <small>Add New</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-table"></i> News Feed
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
                         <a class="btn btn-link" href="{{ route('add_rss') }}">+ Add</a>
                        @if (count($responses) > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>News Feeds</th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th style="width: 150px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($responses as $index => $response)
                                <tr>
                                    <td>{{ str_limit($response->news, 130) }}</td>
                                    <td>{{$response->startdate}}</td>
                                    <td>{{$response->enddate}}</td>                                    
                                    <td>
                                        <a href="{{ route('edit_rss',['id' => $response->id]) }}" class="btn btn-primary" role="button">Edit</a>

                                        <form action="{{route('delete_rss')}}" method="POST" class="pull-right">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

                                            <input type="hidden" name="id" value="{{$response->id}}" required>
                                            <input class="btn btn-danger btn_del" role="button" type="submit" value="Delete"/>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                        @else
                        <div class="alert alert-danger">
                            <p>No Employee to show.</p>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
