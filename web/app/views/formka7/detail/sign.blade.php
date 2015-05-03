
<div class="col-xs-12">
  <div class="" style="margin-top:161px;">
    <div class="sign">

      <div class="sign-left">
        <span class="sign-title">Pendampingan Anak</span><br>
        <div class="spacer"></div>
        <span class="sign-name">(Khairus Febryan F.)</span>
      </div>

      <div class="sign-right">
        <span class="sign-title">Koordinator Pelayanan dan Penanganan Kasus</span><br>
        <div class="spacer"></div>
        <span class="sign-name">(Joko Jumadi)</span>
      </div>

    </div>
  </div>
</div>

<?php if (!empty($data->catatan_hasil_pendampingan)) { ?>
  <div class="col-xs-12">
    <div class="catatan">
      <h6>
        <strong>Catatan Tindak Lanjut Pasca Pendampingan</strong>
      </h6>
      <hr style="margin-top:0px;margin-bottom:6px;">
      {{$data->catatan_hasil_pendampingan}}
    </div>
  </div>
<?php } ?>

  <style>
  .catatan {
    margin-top:34px;
  }
  .catatan p {
    font-size: 10px;
    text-align: justify;
  }
  </style>
