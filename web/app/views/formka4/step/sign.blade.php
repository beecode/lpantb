<?php
if (!isset($record)) {
  $record = $form;
} else {
  $sign = json_decode($record->sign);
}
?>

<div class="form-group">
  <label class="control-label col-sm-4">Assesor/Tracer</label>
  <div class="col-sm-4">
    <?php
      $as_name = "";
      $as_date = "";
      if (isset($sign)){
        $as_name = $sign->assesor->name;
        $as_date = $sign->assesor->date;
      }
    ?>
    <input type="text" name="assesor[name]" class="form-control" value="{{$as_name}}">
    <input type="date" name="assesor[date]" class="form-control" value="{{$as_date}}">
  </div>
</div>


<div class="form-group">
  <label class="control-label col-sm-4">Pelayanan dan Penanganan Kasus LPA NTB</label>
  <div class="col-sm-4">
    <?php
      $pn_name = "";
      $pn_date = "";
      if (isset($sign)){
        $pn_name = $sign->penanganan->name;
        $pn_date = $sign->penanganan->date;
      }
    ?>
    <input type="text" name="penanganan[name]" class="form-control" value="{{$pn_name}}">
    <input type="date" name="penanganan[date]" class="form-control" value="{{$pn_date}}">
  </div>
</div>
