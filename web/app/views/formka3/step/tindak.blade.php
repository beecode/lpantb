<?php
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

<?php $c = 1; ?>
<div class="form-group has-primary">
    <?php foreach ($tindak_lanjut as $tl) { ?>
        <?php
        if ($tl->other == "F") {
            if ($form_status == "edit") {
                $checked = [];
                foreach ($anak->tindak_lanjut as $vtl) {
                    if ($vtl->id == $tl->id) {
                        $checked = ['checked' => 'checked'];
                    }
                }
                ?>
                <label class="col-sm-1"></label>
                <div class="col-sm-3">
                    <div class="checkbox">
                        {{ Form::checkbox('tindak_lanjut[def][][id]', $tl->id, $checked) }}
                        {{$c++}}. {{$tl->aksi}}
                    </div>
                </div>
            <?php } else { ?>
                <label class="col-sm-1"></label>
                <div class="col-sm-3">
                    <div class="checkbox">
                        {{ Form::checkbox('tindak_lanjut[def][][id]', $tl->id) }}
                        {{$c++}}. {{$tl->aksi}}
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>

    <?php
    $ovtl = null;
    if ($form_status == "edit") {
        foreach ($anak->tindak_lanjut as $vtl) {
            if ($vtl->other == "T") {
                $ovtl = $vtl;
            }
        }
        $cko = null;
        $vko = null;
        ?>

        <?php if (!is_null($ovtl)) { ?>
            {{Form::input('hidden','tindak_lanjut[other][id]',$ovtl->id)}}
            <?php $cko = ['checked' => 'checked'] ?>
            <?php $vko = $ovtl->aksi; ?>
        <?php } ?>
        <label class="col-sm-1"></label>
        <div class="col-sm-3">
            <div class="checkbox">
                {{ Form::checkbox('tindak_lanjut[other][check]', true, $cko) }}
                {{$c++}}. Lainnya
                <div style="margin-top: 10px; padding: 0px;">
                    {{Form::text('tindak_lanjut[other][value]',$vko,['class'=>'form-control lain','placeholder'=>'Lainnya'])}}
                </div>
            </div>
        </div>
    <?php } else { ?>
        <label class="col-sm-1"></label>
        <div class="col-sm-3">
            <div class="checkbox">
                {{ Form::checkbox('tindak_lanjut[other][check]', true) }}
                {{$c++}}. Lainnya
                <div style="margin-top: 10px; padding: 0px;">
                    {{Form::text('tindak_lanjut[other][value]','',['class'=>'form-control lain','placeholder'=>'Lainnya'])}}
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="form-group has-primary">
    {{ Form::label('ringkasan_kasus', 'Catatan Tindak Lanjut',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-9">
        <?php $ctl = (isset($record->catatan_tindak_lanjut)) ? $record->catatan_tindak_lanjut : null; ?>
        {{ Form::textarea('form[catatan_tindak_lanjut]', $ctl, ['class' => 'form-control ckeditor','required','rows'=>'8','cols'=>'20'])  }}
    </div>
</div>
