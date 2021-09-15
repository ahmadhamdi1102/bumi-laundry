<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
              <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <div class="logo-lg">Aplikasi Layanan Laundry</div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav style="color: black" class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    <div class="navbar-brand" >Bumi Laundry</div>
     

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
                     
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Halo, <b>".$this->session->userdata('email'); ?></b> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url().'' ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
              </li>             
            </ul>
          </li>    

           <li><a style="margin-right: 20px" href="<?php echo base_url().'Login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>       
        </ul>
      </div><!-- /.navbar-collapse -->

         </nav>
  </header>