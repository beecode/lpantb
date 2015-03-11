<?php if (!empty($data->ringkasan_kasus)) { ?>
    <div class="col-xs-12">
        <p class="lead">Ringkasan Kasus</p>
        <p>{{$data->ringkasan_kasus}}</p>
    </div>
<?php } ?>

<?php if (!empty($data->catatan)) { ?>
    <div class="col-xs-12">
        <p class="lead">Catatan</p>
        <p>{{$data->catatan}}</p>
    </div>
<?php } ?>
<br/>