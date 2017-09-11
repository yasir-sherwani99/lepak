@extends('main')

@section('jsscript')

<script src="{{ URL::asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">
  
  window.setTimeout(function(){
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);

  window.setTimeout(function(){
      $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 5000);

</script>

@endsection

@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Employee Availability</h3>
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissable" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success:</strong> {{ Session::get('success') }}
                  </div>
                @endif
              </div>
            </div>
            <div class="row">

              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                     
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <div class="row">
                      <div class="col-md-9">
                         <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <th class="warning" style="width: 20%;">Employee Name: </th>
                                    <th style="width: 80%;">{{ $employee->fname }}&nbsp;{{ $employee->lname }}</th>
                                  </tr>
                                  <tr>
                                    <th class="warning">Email: </th>
                                    <th>{{ $employee->email }}</th>
                                  </tr>
                                   <tr>
                                    <th class="warning">Designation: </th>
                                    <th>{{ $employee->designation }}</th>
                                  </tr>
                                  <tr>
                                    <th class="warning">Mobile: </th>
                                    <th>{{ $employee->mobile }}</th>
                                  </tr>
                                  <tr>
                                    <th class="warning">CNIC: </th>
                                    <th>{{ $employee->cnic1 }}-{{ $employee->cnic2 }}-{{ $employee->cnic3 }}</th>
                                  </tr>
                                  <tr>
                                    <th class="warning">Address: </th>
                                    <th>{{ $employee->address }}</th>
                                  </tr>
                                  <tr>
                                    <th class="warning">City: </th>
                                    <th>{{ $employee->cityy['cityName'] }}</th>
                                  </tr>
                                </tbody>
                              </table>
                      </div>
                      <div class="col-md-3">
                        <div class="well">
                          <div class="row">
                            <div class="col-md-12">
                              <a href="#" class="thumbnail">
                                 @if($employee->image == "")
                                  <img src="{{ asset('emp_images/' . 'administrator.png') }}" class="img-responsive" style="width: 171px; height: 180px;">
                                 @else
                                   <img src="{{ asset('emp_images/' . $employee->image) }}" class="img-responsive"> 
                                 @endif
                              </a>
                            </div>
                            <div class="col-md-12">
                              <p>
                                <dl class="dl-horizontal">
                                  <dt>Created At:</dt>
                                  <dd>{{ $employee->created_at }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt>Updated At:</dt>
                                  <dd>{{ $employee->updated_at }}</dd>
                                </dl>
                              </p>
                            </div>
                            <div class="col-md-12">
                              
                                <a href="{{ route('employee.index') }}" class="btn btn-info btn-block">Back to Employees</a>
                            
                            </div>
                          </div>
                         
                        </div>   
                      </div>
                    </div>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection