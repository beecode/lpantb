<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/lpantb/formka2')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>
    <a class="btn btn-default"
       href="{{URL::to('/lpantb/formka2/addview')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah
    </a>

    <a class="btn btn-default"
       href="{{URL::to('/lpantb/formka2/addmultiview')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah Multi Kasus
    </a>

    &nbsp;&nbsp;

    <div class="btn-group">
      <a class="btn btn-default"
         href="{{URL::to('/lpantb/formka2')}}">
          <span class="glyphicon glyphicon-th"></span>
          Semua
      </a>
      <a class="btn btn-default"
         href="{{URL::to('/lpantb/formka2/viewMe')}}">
          <span class="glyphicon glyphicon-user"></span>
          Kasus Saya
      </a>
    </div>

</div>

<br/>
<br/>
