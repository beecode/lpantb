


<?php



$forms = $anak->form;
$koordinator = null;
$pendamping = null;
foreach ($forms as $fm) {
  if ($fm->nama =="ka5"){
    $koordinator = $fm->user->first();
  }

  if ($fm->nama == "ka6" ){
    $pendamping = $fm->user->first();
  }
}


?>
<div class="col-xs-12">
  <div class="sign">
    <div class="sign-left">
      <span class="sign-title">Pendamping Anak</span>
      <div class="spacer"></div>
      <span class="sign-name">({{$pendamping->name}})</span>
    </div>
    <div class="sign-right">
      <span class="sign-title">Koordinator Pelayanan dan Penanganan Kasus LPA NTB</span>
      <div class="spacer"></div>
      <span class="sign-name">({{$koordinator->name}})</span>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
