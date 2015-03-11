<?php
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

<div class="form-group">
    <label class="col-sm-3 control-label">Intervensi Yang Dilakukan</label>
</div>

<?php $c = 1; ?>
<div class="form-group">
    <?php foreach ($intervensi as $int) { ?>
        <?php
        if ($int->other == "F") {

            $checked = [];
            foreach ($anak->intervensi as $vtl) {
                if ($vtl->id == $int->id) {
                    $checked = ['checked' => 'checked'];
                }
            }
            ?>
            <label class="col-sm-1"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    {{ Form::checkbox('intervensi[def][][id]', $int->id, $checked) }}
                    {{$c++}}. {{$int->jenis}}
                </div>
            </div>

        <?php } ?>
    <?php } ?>

    <?php
    $ovtl = null;
    if ($form_status == "edit") {
        foreach ($anak->intervensi as $vtl) {
            if ($vtl->other == "T") {
                $ovtl = $vtl;
            }
        }
        $cko = null;
        $vko = null;
        ?>

        <?php if (!is_null($ovtl)) { ?>
            {{Form::input('hidden','intervensi[other][id]',$ovtl->id)}}
            <?php $cko = ['checked' => 'checked'] ?>
            <?php $vko = $ovtl->jenis; ?>
        <?php } ?>
        <label class="col-sm-1"></label>
        <div class="col-sm-3">
            <div class="checkbox">
                {{ Form::checkbox('intervensi[other][check]', true, $cko) }}
                {{$c++}}. Lainnya
                <div style="margin-top: 10px; padding: 0px;">
                    {{Form::text('intervensi[other][value]',$vko,['class'=>'form-control lain','placeholder'=>'Lainnya'])}}
                </div>
            </div>
        </div>
    <?php } else { ?>
        <label class="col-sm-1"></label>
        <div class="col-sm-3">
            <div class="checkbox">
                {{ Form::checkbox('intervensi[other][check]', true) }}
                {{$c++}}. Lainnya
                <div style="margin-top: 10px; padding: 0px;">
                    {{Form::text('intervensi[other][value]','',['class'=>'form-control lain','placeholder'=>'Lainnya'])}}
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="form-group">
    {{ Form::label('ringkasan_kasus', 'Dasar Intervensi',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-9">
        <?php $ctl = (isset($record->dasar_intervensi)) ? $record->dasar_intervensi : null; ?>
        {{ Form::textarea('form[dasar_intervensi]', $ctl, ['class' => 'form-control ckeditor','required','rows'=>'2','cols'=>'20'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('catatan_intervensi', 'Catatan Intervensi',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-9">
        <?php $ci = (isset($record->catatan_intervensi)) ? $record->catatan_intervensi : null; ?>
        {{ Form::textarea('form[catatan_intervensi]', $ci, ['class' => 'form-control ckeditor','required','rows'=>'4','cols'=>'20'])  }}
    </div>
</div>