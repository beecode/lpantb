<?php
$keluarga = null;
if (!is_null($anak->keluarga)) {
    $keluarga = $anak->keluarga;
}
?>


<div class="form-group">
    <label class="control-label" style="margin-left: 5.6%;">
        <p class="lead">Status Perkawinan Orang Tua</p>
    </label>
</div>


<?php if ($form_status == "edit") { ?>
    <?php if (!is_null($keluarga)) { ?>
        {{Form::input('hidden','keluarga[id]', $keluarga->id)}}
    <?php } ?>
<?php } ?>

<div class="form-group">
    {{ Form::label('keluarga[ke]', 'Status Perkawinan', ['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        <label class="radio-inline">
            <?php
            $kl['si'] = false;
            if (isset($keluarga)) {
                if ($keluarga->status == "Suami Istri") {
                    $kl['si'] = true;
                }
            }
            ?>
            {{ Form::radio('keluarga[status]', 'Suami Istri',$kl['si']);}} Suami Istri
        </label>
        <label class="radio-inline">
            <?php
            $kl['ch'] = false;
            if (isset($keluarga)) {
                if ($keluarga->status == "Cerai Hidup") {
                    $kl['ch'] = true;
                }
            }
            ?>
            {{ Form::radio('keluarga[status]', 'Cerai Hidup',$kl['ch']);}} Cerai Hidup
        </label>
        <label class="radio-inline">
            <?php
            $kl['cm'] = false;
            if (isset($keluarga)) {
                if ($keluarga->status == "Cerai Mati") {
                    $kl['cm'] = true;
                }
            }
            ?>
            {{ Form::radio('keluarga[status]', 'Cerai Mati',$kl['cm']);}} Cerai Mati
        </label>
    </div>
</div>