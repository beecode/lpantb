<style>
.sign{
  text-align: center;
  font-size: 12px;
}

.sign .sign-left{
  margin-left:0%;
}
.sign .sign-right{
  margin-right:0%;
}

.sign .spacer{
  height:55px;
}
.sign .sign-name{
  font-weight:bold;
}

.sign .sign-title{
  font-weight:bold;
}
</style>


<div class="col-xs-12">
  <div class="row" style="margin-top:34px;">
    <div class="col-xs-1"></div>

    <div class="col-xs-5 pull-left sign">
      <div class="sign-left">
        <span class="sign-title">Penerima Laporan</span>
        <div class="spacer"></div>
        <span class="sign-name">(Lalu Erfandi Maula Yusnu, S.Kom)</span>
      </div>
    </div>

    <div class="col-xs-5 pull-right sign">
      <div class="sign-right">
        <span class="sign-title">Pelapor/Pengadu</span>
        <div class="spacer"></div>
        <span class="sign-name">(Abdul Manan)</span>
      </div>
    </div>
    <div class="col-xs-1"></div>

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
