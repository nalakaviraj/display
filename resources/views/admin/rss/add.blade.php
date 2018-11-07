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
                    Rss <small>Add New</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-table"></i> Rss
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

                        @if(Session::has('success'))
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-2">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{ Session::get('success') }} 
                                </div>
                            </div>
                        </div>
                        @endif

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


                        <form action="{{ route('store_rss') }}" class="horizantal-forms" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label class="control-label">News</label>
                                <textarea  onkeyup="charactor_count()" rows="2" name="news" id="news" class="form-control"></textarea>
                            </div>
                            <div class="checkbox">
                                <label><input onchange="show_schedule()" type="checkbox" value='1' name="schedule" id="schedule" value="">Schedule</label>
                            </div>

                            <div id="shadules" style="display: none">

                                <div class="form-group">
                                    <label class="control-label">Start Date</label>
                                    <input type="date" class="form-control" name="startdate"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">End Date</label>
                                    <input type="date" class="form-control" name="enddate"/>
                                </div>

                            </div>
                            <div id="add" >
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                        <script>
                            function charactor_count(){
                                var str = $('#news').val().length;
                                if(str > 200){
                                    $('#add').hide();
                                    alert("News feed cannot exceed morthen 200 charactors!");
                                }else{
                                    $('#add').show();
                                }
                            }
                            function show_schedule() {

                                if ($('#schedule').is(":checked"))
                                {
                                    $('#shadules').show();
                                } else {
                                    $('#shadules').hide();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
