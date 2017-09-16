@if (Auth::check())

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

                    <form class="form-horizontal form-label-left" data-parsley-validate action="{{ URL::route('employee.update', $emp->id) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                      <span class="section">Update Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="fname" value="{{ $emp->fname }}" data-parsley-required="true" data-parsley-minlength="3" data-parsley-pattern="[a-zA-Z]+$" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="lname" value="{{ $emp->lname }}" data-parsley-required="true" data-parsley-minlength="3" data-parsley-pattern="[a-zA-Z]+$" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" data-parsley-type="email" class="form-control col-md-7 col-xs-12" value="{{ $emp->email }}" data-parsley-required="true">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" name="address" class="form-control col-md-7 col-xs-12" data-parsley-required="true" data-parsley-minlength="10">{{ $emp->address }}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="city" class="form-control col-md-7 col-xs-12" data-parsley-required="true">
                            <option value="{{ $emp->cityy['id'] }}">{{ $emp->cityy['cityName'] }}</option>
                            @foreach($city as $ccity)
                              <option value="{{ $ccity->id }}">{{ $ccity->cityName }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">CNIC <span class="required">*</span>
                        </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <table border="0">
                            <tr>
                              <td style="width: 25%;">
                                <input type="text" id="cnic1" name="cnic1" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" value="{{ $emp->cnic1 }}" data-parsley-minlength="5" data-parsley-maxlength="5" data-parsley-required="true" style="width: 100%;">
                              </td>
                              <td style="width: 50%;">  
                                <input type="text" id="cnic2" name="cnic2" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" value="{{ $emp->cnic2 }}" data-parsley-minlength="7" data-parsley-maxlength="7" data-parsley-required="true" style="width: 100%;">
                              </td>
                              <td style="width: 25%;">  
                                <input type="text" id="cnic3" name="cnic3" data-parsley-type="digits" class="form-control col-md-7 col-xs-12" value="{{ $emp->cnic3 }}" data-parsley-minlength="1" data-parsley-maxlength="1" data-parsley-required="true" style="width: 100%;">
                              </td>
                            </tr>    
                          </table>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          <input type="number" id="number" name="mob"  data-parsley-minlength="11" data-parsley-maxlength="11" data-parsley-required="true" class="form-control col-md-7 col-xs-12" value="{{ $emp->mobile }}">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="desig" class="form-control col-md-7 col-xs-12" data-parsley-required="true">
                            <option value="{{ $emp->designation }}">{{ $emp->designation }}</option>
                            <option value="Operator">Operator</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Foreman">Foreman</option>
                          </select>
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
                          <input type="submit" class="btn btn-primary" name="submit" value="Update">
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
@endif