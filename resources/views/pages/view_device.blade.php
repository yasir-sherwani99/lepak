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
                <h3>Device Availability</h3>
                
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
                    <h2>Listed Devices</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                     
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>listed available devices and information with specified actions</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 4%">#</th>
                          <th style="width: 10%">Device Name</th>
                          <th style="width: 10%">Device Manufacturer</th>
                          <th style="width: 10%">Device Serial</th>
                          <th style="width: 10%">Device Mac</th>
                          <th style="width: 10%">Device Quantity</th>
                          <th style="width: 10%">Created At</th>
                          <th style="width: 10%">Updated At</th>
                          <th style="width: 8%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $i = 1
                        @endphp
                        @foreach($device as $ddevice)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>
                            <a>{{ $ddevice->deviceName }}</a>
                          </td>
                          <td>
                            <a>{{ $ddevice->deviceManufac }}</a>
                          </td>
                          <td>
                            <a>{{ $ddevice->deviceSerial }}</a>
                          </td>
                          <td>
                            <a>{{ $ddevice->deviceMac }}</a>
                          </td>
                          <td>
                            <a>{{ $ddevice->qty }}</a>
                          </td>
                          <td>{{ $ddevice->created_at }}</td>
                          <td>{{ $ddevice->updated_at }}</td>
                         
                          <td>
                            {{ Html::linkRoute('device.edit', 'Edit', array($ddevice->id), ['class' => 'btn btn-info btn-xs', 'style' => 'float: left;']) }}
                            <form method="POST" action="device/{{ $ddevice->id }}">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-xs">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection