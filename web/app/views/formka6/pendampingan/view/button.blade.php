<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/lpantb/formka6')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>

    <a class="btn btn-primary"
       href="{{URL::to('/lpantb/formka6')}}">
        <span class="glyphicon glyphicon-arrow-left"></span>
        Kembali
    </a>
    <a class="btn btn-default"
       href="{{URL::to('/lpantb/formka6/pendampingan/addview/'.$anak->id)}}">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah
    </a>


</div>
<div class="pull-right">
  <a class="btn btn-default"
     href="{{URL::to('/lpantb/formka6/pendampingan/printPreview/'.$anak->id)}}">
      <span class="fa fa-print"></span>
      Print Preview
  </a>
</div>
<div class="clearfix"></div>
