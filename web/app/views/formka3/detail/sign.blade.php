
<?php
// $sign = json_decode($data->sign);
// $penerima = $sign->penerima;
?>


<div class="col-xs-12">
  <div class="sign">
    <!-- <div class="sign-left">
      <span class="sign-title">Penerima Laporan</span>
      <div class="spacer"></div>
      <span class="sign-name">()</span>
    </div> -->
    <div class="sign-right">
      <span class="sign-title">Mataram, {{date('d F Y')}}</span>
      <div class="spacer"></div>
      <span class="sign-name">({{$data->user->first()->name}})</span>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
