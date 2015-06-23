<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/dash/formka6')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>

    <a class="btn btn-primary"
       href="{{URL::to('/dash/formka6')}}">
        <span class="glyphicon glyphicon-arrow-left"></span>
        Kembali
    </a>
    <?php
      $amICreateThis = false;
      $loggedUser = Auth::user();
      $forms = $anak->form;
      foreach($forms as $fm){
        if ($fm->nama == "ka6"){ //if this form is ka6 then
            $authorUser = $fm->user->first();
            if ($loggedUser->id == $authorUser->id){
              $amICreateThis = true;
            }
        }
      }
     ?>
    <?php if ($amICreateThis == true){ ?>
    <a class="btn btn-default"
       href="{{URL::to('/dash/formka6/pendampingan/addview/'.$anak->id)}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah
    </a>
    <?php } ?>


</div>
<div class="pull-right">
  <a class="btn btn-warning"
     href="{{URL::to('/dash/formka6/pendampingan/printPreview/'.$anak->id)}}">
      <span class="fa fa-print"></span>
      Print Preview
  </a>
</div>
<div class="clearfix"></div>
