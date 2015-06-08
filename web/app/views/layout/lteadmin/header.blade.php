<header class="header">
  <a href="<?php echo URL::to('/admin/index'); ?>" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    Dashboard LPA
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">

      <ul class="nav navbar-nav">
        @include('layout.lteadmin.header.notification')
        @include('layout.lteadmin.header.front')
        @include('layout.lteadmin.header.logout')
      </ul>
    </div>
  </nav>
</header>
