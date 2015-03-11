<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu" style="margin-top: 6">
            <li>
                <a href="{{ URL::to('/') }}"><i class="fa fa-home fa-fw"></i> Dashboard</a>
            </li>
            <!--            <li>
                            <a href="{{ URL::to('/lpantb/wizardtest') }}"><i class="fa fa-yen fa-fw"></i> Tes Wizard</a>
                        </li>-->
            <li>
                <a href="#">
                    <i class="fa fa-list-ul fa-fw "></i> 
                    Setting
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#">Manajemen Data Lokasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li>
                                <a href="<?php echo URL::to('/lpantb/provinsi'); ?>">Provinsi</a>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/lpantb/kabkota'); ?>">Kabupaten / Kota</a>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/lpantb/kecamatan'); ?>">Kecamatan</a>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('/lpantb/desa'); ?>">Desa / Lurah</a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/agama'); ?>">
                            Manajemen Data Agama
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/user'); ?>">
                            User
                        </a>
                    </li>
                    <li class="divider"></li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-list-ul fa-fw "></i> 
                    Form Kasus Anak
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka1'); ?>">
                            Form KA 1
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka2'); ?>">
                            Form KA 2
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka3'); ?>">
                            Form KA 3
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka4'); ?>">
                            Form KA 4
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka5'); ?>">
                            Form KA 5
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka6'); ?>">
                            Form KA 6
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/formka7'); ?>">
                            Form KA 7
                        </a>
                    </li>
                    <li class="divider"></li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-table fa-fw "></i> 
                    Table Kasus 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form1/read'); ?>">
                            Data Form KA 1
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form2/read'); ?>">
                            Data Form KA 2
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form3/read'); ?>">
                            Data Form KA 3
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form4/read'); ?>">
                            Data Form KA 4
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form5/read'); ?>">
                            Data Form KA 5
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form6/read'); ?>">
                            Data Form KA 6
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/form7/read'); ?>">
                            Data Form KA 7
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/lpantb/register/read'); ?>">
                            Register Kasus
                        </a>
                    </li>
                    <li class="divider"></li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 
                    Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo URL::to('/lpantb/donatchart'); ?>">Morris.js Charts</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>