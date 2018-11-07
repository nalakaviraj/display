@extends('layouts.app')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <h1 class="page-header">TOP PRICES -
                    <small>ESTATE / DIVISION</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        @if(Session::has('success'))
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{ Session::get('success') }} <strong> Successfully !!</strong>
                </div>
            </div>
        </div>
        @endif


        <div class="row">

            <div class="col-lg-8 col-md-offset-2">

                <form method="post" action="{{ url("/admin/pro_report/price/add") }}" >
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    
                    <input type="hidden" name="table" value="{{ $table }}" />
                    <input type="hidden" name="id" value="{{ $id }}" />
                    
                    <div class="form-group">
                         <div class="col-md-2"><label class="control-label">Tea type</label></div>
                        <div class="col-md-10"><input class="form-control" name="teatype" required="" /> </div>
                    </div>
                    </br></br></br>
                    <div class="form-group">
                         <div class="col-md-2"><label class="control-label">Price</label></div>
                        <div class="col-md-10"><input class="form-control" name="price" required="" /> </div>
                    </div>
                   
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        </br>
                        <button class="btn btn-primary" type="submit" >Add</button>
                    </div>
                </form>
                
                </br></br></br></br>

                <table class="table table-condensed">
                    <thead>
                    <th>Tea Type</th>
                    <th>Price</th>
                    <th></th>
                    </thead>
                    <body>
                    @foreach ($price as $value)
                    <tr>
                    <form action="{{ url('/admin/pro_report/price/delete') }}" method="post" >
                        <input type="hidden" value="{{$value->id}}" name="id" />
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <td> {{$value->teatype}}</td>
                        <td> {{$value->price}}</td>
                        <td><button class="btn btn-danger" type="submit" >Delete</button></td>
                    </form>
                    </tr>
                    @endforeach
                    </body>
                </table>

            </div>

        </div><!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
