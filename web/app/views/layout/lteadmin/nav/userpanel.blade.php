<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo URL::to("lte/img/avatar3.png"); ?>"
             class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>Hello, {{Auth::user()->username}}</p>

        <a href="#">
            <i class="fa fa-circle text-success"></i> Online
        </a>
    </div>
</div>