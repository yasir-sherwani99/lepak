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
                    <h2>Device Updation Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                 
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="{{ URL::route('device.update', $device->id) }}" method="post"  data-parsley-validate>
                    <input type="hidden" name="_method" value="PUT">

                      <span class="section">Update Device Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="dname" value="{{ $device->deviceName }}" placeholder="Enter Device Name" type="text" data-parsley-required="true" data-parsley-minlength="3">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device Manufacturer <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="{{ $device->deviceManufac }}" name="manufact" placeholder="Enter Device Manufecturer" type="text" data-parsley-required="true" data-parsley-minlength="3">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device Serial <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="serial" value="{{ $device->deviceSerial }}" placeholder="Enter Device Serial" type="text" data-parsley-required="true">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device Mac <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="mac" value="{{ $device->deviceMac }}" placeholder="Enter Device Mac Address" type="number" data-parsley-required="true" data-parsley-minlength="12">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="dqty" value="{{ $device->qty }}" placeholder="Enter Device Quantity" type="text" data-parsley-required="true">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                          
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