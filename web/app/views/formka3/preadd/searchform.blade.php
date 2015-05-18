
<form class="form-horizontal" method="POST" action="{{$form_url}}">
  <div class="form-group">
    <label class="control-label col-sm-2">Kata Kunci</label>
    <div class="col-sm-4">
      <div class="input-group">
        <?php $keyword = isset($keyword) ? $keyword : null; ?>
        <input type="text" class="form-control"
        name="keyword" value="{{$keyword}}"
        style="font-size:13px;">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Tahun Kata Kunci</label>
    <div class="col-sm-3">
      <?php
        $yearArray =[];
        $start = 2000;
        $now = date('Y');
        for ($i=$now; $i>=$start; $i--){
          $yearArray[$i] = $i;
        }
       ?>
       {{Form::select('year',$yearArray, $selectedYear,['class'=>'form-control','style'=>'font-size:13px;'])}}
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Acuan Kata Kunci</label>
    <!-- <div class="col-sm-5"> -->
    <label class="radio-inline">
      <input type="radio" name="based" value="anak" checked="checked"> &nbsp;
      <strong>Nama Anak</strong>
    </label>
    <label class="radio-inline">
      <input type="radio" name="based" value="lka"
        <?php if ($based=="lka") echo 'checked=="checked"'; ?> > &nbsp;
      <strong>No LKA</strong>
    </label>
    <!-- </div> -->
  </div>
</form>
