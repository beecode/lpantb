<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/dash/formka2')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>
    <a class="btn btn-default"
       href="{{URL::to('/dash/formka2/addview')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah
    </a>

    <a class="btn btn-default"
       href="{{URL::to('/dash/formka2/addmulti')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah Multi Kasus
    </a>

    &nbsp;&nbsp;

    <div class="btn-group">
      <a class="btn btn-default"
         href="{{URL::to('/dash/formka2')}}">
          <span class="glyphicon glyphicon-th"></span>
          Semua
      </a>
      <a class="btn btn-default"
         href="{{URL::to('/dash/formka2/viewMe')}}">
          <span class="glyphicon glyphicon-user"></span>
          Kasus Saya
      </a>
    </div>

</div>

<div class="pull-left col-sm-2">
  <form role="form" method="POST" action="{{URL::to('/dash/formka2/viewYear')}}">
    <div class="input-group input-group has-warning">
      <?php
        $yearArray =[];
        $start = 2000;
        $now = date('Y');
        for ($i=$now; $i>=$start; $i--){
          $yearArray[$i] = $i;
        }
       ?>
       {{Form::select('year',$yearArray, $selectedYear,['class'=>'form-control','style'=>'font-size:13px;'])}}
      <span class="input-group-btn">
          <button class="btn btn-warning" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
      </span>
    </div>
  </form>
</div>

<br/>
<br/>
