@extends('main')

@section('content')

  <!-- Form  -->
  <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Registration Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                     @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                 
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" data-parsley-validate action="{{ action('EmployeeController@store') }}" method="post" enctype="multipart/form-data">

                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="fname" placeholder="Enter first name" data-parsley-required="true" data-parsley-minlength="3" data-parsley-pattern="[a-zA-Z]+$" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="lname" placeholder="Enter last name" data-parsley-required="true" data-parsley-minlength="3" data-parsley-pattern="[a-zA-Z]+$" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" data-parsley-type="email" class="form-control col-md-7 col-xs-12" placeholder="Enter email" data-parsley-required="true">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="address" class="form-control col-md-7 col-xs-12" placeholder="Enter address" data-parsley-required="true" data-parsley-minlength="10"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">CNIC <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cnic" name="cnic1" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" placeholder="e.g. 35202" data-parsley-minlength="5" data-parsley-maxlength="5" data-parsley-required="true" style="width: 15%;">
                          <input type="text" id="cnic" name="cnic2" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" placeholder="e.g. 1234567" data-parsley-minlength="7" data-parsley-maxlength="7" data-parsley-required="true" style="width: 40%;">
                          <input type="text" id="cnic" name="cnic3" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" placeholder="e.g. 1" data-parsley-minlength="1" data-parsley-maxlength="1" data-parsley-required="true" style="width: 10%;">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="city" class="form-control col-md-7 col-xs-12" data-parsley-required="true">
                            <option value="">Select City</option>
                            @foreach($city as $ccity)
                              <option value="{{ $ccity->id }}">{{ $ccity->cityName }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          <input type="number" id="number" name="mob"  data-parsley-minlength="11" data-parsley-maxlength="11" data-parsley-required="true" class="form-control col-md-7 col-xs-12" placeholder="Enter mobile number">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="desig" class="form-control col-md-7 col-xs-12" data-parsley-required="true">
                            <option value="">Select Designation</option>
                            <option value="Operator">Operator</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Foreman">Foreman</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12" data-parsley-minlength="6" data-parsley-required="true"placeholder="Enter password">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" class="form-control col-md-7 col-xs-12" data-parsley-equalto="#password" placeholder="Re-enter password" data-parsley-required="true">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Employee Picture <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="img" type="file" name="img" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /Form  -->
@endsection