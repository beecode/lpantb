<?php

$assesor = $data->user->first()->name;

$anak = $data->anak->first();
$forms = $anak->form;
$user_formka3 = null;
foreach ($forms as $fm) {
  if ($fm->nama =="ka3"){
    $user_formka3  = $fm->user->first();
  }
}

$koordinator = $user_formka3->name;

?>
<div class="col-xs-12">
  <div class="">
    <div class="sign">

      <div class="sign-left">
        <span class="sign-title">Tanggal {{date('d F Y')}}</span><br>
        <span class="sign-title">Assesor Tracer</span>
        <div class="spacer"></div>
        <span class="sign-name">({{$assesor}})</span>
      </div>

      <div class="sign-right">
        <span class="sign-title">Tanggal {{date('d F Y')}}</span><br>
        <span class="sign-title">Pelayanan dan Penanganan Kasus LPA NTB</span>
        <div class="spacer"></div>
        <span class="sign-name">({{$koordinator}})</span>
      </div>

    </div>
  </div>
</div>
