@extends('layouts.app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <h1 class="page-header">ALL TIME RECORD PRICES - 
                            <small>ESTATE / DIVISION</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-4 col-md-offset-2">
                        <h3 class="page-header {{ (Request::is('admin/pro_report/alltimerecordprices/add/KVPL')) ?  'link-hightliter':'' }}"> <a href="{{ url('/admin/pro_report/alltimerecordprices/add/KVPL') }}">KELANI VALLEY </a>
                        </h3>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="page-header {{ (Request::is('admin/pro_report/alltimerecordprices/add/TTEL')) ?  'link-hightliter':'' }}"> <a href="{{ url('/admin/pro_report/alltimerecordprices/add/TTEL') }}">TALAWAKELLE</a>
                        </h3>
                    </div>
                </div>

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

                  <form method="post" action="{{ url("/admin/pro_report/alltimerecordprices/add") }}" >
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="form-group">
                      <label for="" class="col-md-2">Region</label>
                      <div class="col-md-10">
                        <select class="form-control " id="region" name="region">
                          @if($region)
                            @foreach ($region as $value)
                                <<option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                    </br></br>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-2">Estate</label>
                      <div class="col-md-10">

                      <input type="hidden" name="plantation_id" value="{{ $plantation_id }}">
                      <select class="form-control " id="estate_id" name="estate_id">
                          @foreach ($estates as $estate)
                            <?php $estate1 = App\Employee::where('estate_id', $estate->estate_id)->first();

                                    if(count($estate1) > 0){
                                      echo '<option value="'.$estate->estate_id.'_'.$estate1->employee_id.' ">'.$estate->estate_name.' / '.$estate1->employee_name.'</option>';
                                    }else{
                                      echo '<option value="'.$estate->estate_id.'_0">'.$estate->estate_name.'</option>';
                                    }
                            ?>
                          @endforeach
                      </select>
                      </div>
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
                            <th>Region</th>
                            <th>Estate</th>
                            <th>Manager</th>
                            <th>Created Date</th>
                            <th></th>
                          </thead>
                          <body>
                            @foreach ($alltimerecordprices as $value)

                              <tr>
                                <form action="{{ url('/admin/pro_report/alltimerecordprices/delete') }}" method="post" >
                              <input type="hidden" value="{{$value->id}}" name="id" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <td>{{ (App\Region::where('id',$value->region)->first())->name }}</td>
                              <td>{{ (App\Estate::where('estate_id',$value->estate_id)->first())->estate_name }} ({{$value->estate_id}})</td>
                              
                              <?php
                              if(!empty((App\Employee::where('employee_id',$value->manager_id)->first())->employee_id)){
                                  ?>
                                    <td>{{ (App\Employee::where('employee_id',$value->manager_id)->first())->employee_name }} ({{$value->manager_id}})</td>
                                  <?php
                              }else{
                                  ?>
                                    <td><p style="color:red">This Employee Deleted!</p></td>
                                  <?php
                              }
                              ?>
                              
                              
                              <td> {{$value->created_at}}</td>
                              <td>
                                  <a class="btn btn-primary" href="{{ url('/admin/pro_report/price/add') }}/allprice/{{$value->id}}" >Add price</a>
                                  <button class="btn btn-danger" type="submit" >Delete</button>
                              </td>
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
