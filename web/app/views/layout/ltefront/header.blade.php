<header class="header">
    <a href="<?php echo URL::to('/admin/index'); ?>" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        LPA NTB
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
		<?php if (Auth::check()) { ?>
			<li class="dropdown user user-menu">
               		     <a class="" href="{{URL::to('dash')}}">
                        	<i class="glyphicon glyphicon-dashboard"></i>
                        	<span>Dashboard</span>
                    	     </a>
                	</li>
			<li class="dropdown user user-menu">
               		     <a class="" href="{{URL::to('login/doLogout')}}">
                        	<i class="glyphicon glyphicon-log-out"></i>
                        	<span>Log Out</span>
                    	     </a>
                	</li>
		<?php } else { ?>
			<li class="dropdown user user-menu">
               		     <a class="" href="{{URL::to('login')}}">
                        	<i class="glyphicon glyphicon-log-in"></i>
                        	<span>Login</span>
                    	     </a>
                	</li>
		<?php } ?>
            </ul>
        </div>
    </nav>
</header>
