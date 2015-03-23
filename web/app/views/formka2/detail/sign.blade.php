<div class="col-xs-12">
  <div class="sign">
    <div class="sign-left">
      <span class="sign-title">Penerima Laporan</span>
      <div class="spacer"></div>
      <span class="sign-name">(Lalu Erfandi, S.Kom)</span>
    </div>
    <div class="sign-right">
      <span class="sign-title">Pelapor/Pengadu</span>
      <div class="spacer"></div>
      <span class="sign-name">(Abdul Manan)</span>
    </div>
    <div class="clearfix"></div>
  </div>

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
