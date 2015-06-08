<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/dash/formka3')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>

    <?php if (UserHelper::amIAdmin()){  ?>

      <a class="btn btn-default"
         href="{{URL::to('/dash/formka3/preaddview')}}">
          <span class="glyphicon glyphicon-plus"></span>
          Tambah
      </a>

      <a class="btn btn-default"
         href="{{URL::to('/dash/formka3')}}">
          <span class="glyphicon glyphicon-th-list"></span>
          Semua
      </a>
    <a class="btn btn-default"
       href="{{URL::to('/dash/formka3/viewLKA')}}">
        LKA Baru &nbsp;
        <label class="label label-danger">{{$countLKA}}</label>
    </a>
    <?php } ?>
</div>


<div class="pull-left col-sm-2">

  <?php
    if ($location=="lka"){
      $action = '/dash/formka3/viewLKA';
    } else {
      $action = '/dash/formka3/viewYear';
    }
  ?>
  <form role="form" method="GET" action="{{$action}}">
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
<!-- <div class="clearfix"></div> -->
<br><br>
