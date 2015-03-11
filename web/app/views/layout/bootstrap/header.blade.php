<div id="wrapper"> 
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" 
                    data-target=".sidebar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="row">
                <div class="col-xs-1">
                </div>
<!--                <div class="col-xs-2">
                    <img src="{{ URL::to('/images/lpa.png') }}" alt="" 
                         width="50" height="50" class="img-rounded">
                </div>-->
                <div class="col-xs-12">
                    <a class="navbar-brand" href="{{ URL::to('/adminitrator/home') }}"> 
                        <strong>Lembaga Pendidikan Anak</strong></a>
                </div>
            </div>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li >
                <a href="#">
                    <i class="fa fa-pencil-square-o  fa-fw"></i>
                    Profile
                </a>
            </li> 
            <li >
                <a href="#">
                    <i class="fa fa-cog fa-fw"></i>
                    Setting
                </a>
            </li> 
            <li >
                <a href="#">
                    <i class="fa fa-user fa-fw"></i>
                    Logout
                </a>
            </li>                
        </ul>