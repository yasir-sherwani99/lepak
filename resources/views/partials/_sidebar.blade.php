<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('index') }}" class="site_title"><img src="images/lepark.jpg" width="50" height="50" class="img-circle">&nbsp;<span>LePark!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('index') }}"><i class="fa fa-home"></i> Home </a>
                    <ul class="nav child_menu">
                

                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Registration Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    
                      <li><a href="{{ route('register') }}">Admin Registration</a></li>
                      <li><a href="{{ route('employee.create') }}">Employee Registration</a></li>
                      <li><a href="{{ route('device.create') }}">Device Registration</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Availability <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('site.index') }}">Sites Availability</a></li>
                      <li><a href="{{ route('employee.index') }}">Employees Availability</a></li>
                      <li><a href="{{ route('admin.index') }}">Admins Availability</a></li>
                      <li><a href="{{ route('device.index') }}">Devices Availability</a></li>
                      <li><a href="{{ route('location.index') }}">Location Availability</a></li>
                      <li><a href="{{ route('city.index') }}">Cities Availability</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Manage Locations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('location.create') }}">Location Registration</a></li>
                      <li><a href="{{ route('site.create') }}">Sites Registration</a></li>
                      <li><a href="{{ route('city.create') }}">City Registration</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Manage Devices <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('location.create') }}">Device Allocation</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Sales Chart</a></li>
                      <li><a href="chartjs2.html">Weekly income chart</a></li>
                      <li><a href="morisjs.html">Monthly income chart</a></li>
                      <li><a href="echarts.html">Agent attandance</a></li>
                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Alerts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Absense</a></li>
                      <li><a href="fixed_footer.html">Inactivity</a></li>
                      <li><a href="fixed_footer.html">Location</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                                   
                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
           
          </div>
        </div>