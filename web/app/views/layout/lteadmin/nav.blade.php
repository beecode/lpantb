<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 260px;">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas" style="min-height: 260px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            @include('layout.lteadmin.nav.userpanel')

            <ul class="sidebar-menu">
                <li class="active">
                    <a href="<?php echo URL::to('/dash'); ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php  if (Auth::user()->level == "admin" || Auth::user()->level == "creator") {?>
                <li class="active">
                    <a href="<?php echo URL::to('/dash/user'); ?>">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                  <?php } ?>

                <li class="active">
                    <a href="<?php echo URL::to('/dash/notifikasi/view'); ?>">
                      <i class="fa fa-envelope"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
                <li class="treeview active">
                    @include('layout.lteadmin.nav.kasus')
                </li>
                <?php  if (Auth::user()->level == "admin" || Auth::user()->level == "creator") {?>
                <li class="treeview">
                    @include('layout.lteadmin.nav.setting')
                </li>
                <?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
