<div class="pull-left">
    <?php if ($location == "search") { ?>
        <a class="btn btn-primary"
           href="{{URL::to('/lpantb/provinsi')}}">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Kembali
        </a>
    <?php } ?>
    <a class="btn btn-default" 
       href="{{URL::to('/lpantb/provinsi/addview')}}">
        <span class="glyphicon glyphicon-plus"></span>
        Add
    </a>
</div>
<div class="clearfix"></div>