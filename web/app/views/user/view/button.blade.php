<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/dash/user')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>
    <a class="btn btn-default"
       href="{{URL::to('/dash/user/addview')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah
    </a>

    <?php $id = Auth::user()->id; ?>
    <a class="btn btn-default"
       href="{{URL::to('/dash/user/updateview/'.$id)}}">
        <span class="glyphicon glyphicon-user"></span>
        Akun Saya
    </a>
</div>
<div class="clearfix"></div>
<br>
