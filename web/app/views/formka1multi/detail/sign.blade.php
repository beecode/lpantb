<?php
$sign = json_decode($data->sign);
$penerima = $sign->penerima;
$pelapor = $sign->pelapor;
?>


<div class="col-xs-12">
  <div class="sign">
    <div class="sign-left">
      <span class="sign-title">Penerima Laporan</span>
      <div class="spacer"></div>
      <span class="sign-name">({{$penerima->name}})</span>
    </div>
    <div class="sign-right">
      <span class="sign-title">Pelapor/Pengadu</span>
      <div class="spacer"></div>
      <span class="sign-name">({{$pelapor}})</span>
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<?php if (!empty($data->catatan)) { ?>
  <div class="col-xs-12">
    <div class="catatan">
      <h6>
        <strong>Catatan</strong>
      </h6>
      <hr style="margin-top:0px;margin-bottom:6px;">
      {{$data->catatan}}
    </div>
  </div>
  <?php } ?>

  <style>
  .catatan p {
    font-size: 10px;
    text-align: justify;
  }
  </style>
