@if (Auth::check())

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
                      <div class="col-md-3">
                          <a href="#" class="thumbnail" style="border: none;">
                             @if($employee->image == "")
                              <img src="{{ asset('emp_images/' . 'administrator.png') }}" class="img-responsive img-circle" style="width: 171px; height: 180px;">
                             @else
                               <img src="{{ asset('emp_images/' . $employee->image) }}" class="img-responsive img-circle"> 
                             @endif
                          </a>
                      </div>
                      <div class="col-md-6">
                        <h1>{{ $employee->fname }}&nbsp;{{ $employee->lname }}</h1>
                        <h3 style="color: #1ABC9C;">{{ $employee->designation }}</h3>
                        <p>
                            {{ $employee->email }}
                            <br/>
                            0{{ $employee->mobile }}
                        </p>
                      </div>
                      <div class="col-md-3">
                        <h4 style="font-weight: bold;">Address</h4>
                        <br>  
                        <p>
                           0{{ $employee->mobile }}
                           <br/> 
                           {{ $employee->address }}
                           <br/>
                           {{ $employee->cityy['cityName'] }} 
                        </p>  
                        <hr/>
                        <p>
                           <a href="{{ route('employee.index') }}" class="btn btn-info btn-block">Back to Employees</a>
                            
                        </p>  
                      </div>
                
                    </div>
                    <hr/>
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                          <tr>
                              <th style="width: 20%;">Name</th>
                              <th style="width: 20%;">Device #</th>
                              <th style="width: 20%;">Site</th>
                              <th style="width: 20%;">Location</th>
                              <th style="width: 20%;">City</th>
                          </tr>
                          <tr>
                              <td>{{ $employee->fname }}&nbsp;{{ $employee->lname }}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>  
                        </table>
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
@endif