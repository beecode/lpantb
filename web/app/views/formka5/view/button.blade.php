<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/dash/formka5')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>
    <?php if (UserHelper::amIAdmin()){  ?>
    <?php if (Auth::user()->level == "admin"){?>
      <a class="btn btn-default"
         href="{{URL::to('/dash/formka5/preaddview')}}">
          <span class="glyphicon glyphicon-plus"></span>
          Tambah
      </a>
    <?php } ?>


    <a href="{{URL::to('dash/formka5/assessment')}}" class="btn btn-default">
      Assessment
      <label class="label label-danger">
        {{$disposisiCount}}
      </label>
    </a>

    &nbsp;&nbsp;

    <div class="btn-group">
      <a class="btn btn-default"
         href="{{URL::to('/dash/formka5')}}">
          <span class="glyphicon glyphicon-th"></span>
          Semua
      </a>
      <a class="btn btn-default"
         href="{{URL::to('/dash/formka5/viewMe')}}">
          <span class="glyphicon glyphicon-user"></span>
          Kasus Saya
      </a>
    </div>
    <?php } ?>
</div>

<div class="pull-left col-sm-2">
  <?php
    if ($location=="disposisi"){
      $action = 'dash/formka5/assessmentYear';
    } else {
      $action = '/dash/formka5/viewYear';
    }
  ?>
  <form role="form" method="POST" action="{{URL::to($action)}}">
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
