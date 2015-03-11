<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 260px;">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas" style="min-height: 260px;">                
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            @include('layout.lteadmin.nav.userpanel')

            <ul class="sidebar-menu">
                <li class="active">
                    <a href="<?php echo URL::to('/lpantb/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php  if (Auth::user()->level == "admin") {?>
                <li class="active">
                    <a href="<?php echo URL::to('/lpantb/user'); ?>">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                
                <?php } ?>
                <li class="treeview">
                    @include('layout.lteadmin.nav.kasus')
                </li>
                <li class="treeview">
                    @include('layout.lteadmin.nav.setting')
                </li>
                <li>
                    <a href="<?php echo URL::to('/lpantb/report'); ?>">
                        <i class="fa  fa-file-text-o"></i> 
                        <span>Report</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

