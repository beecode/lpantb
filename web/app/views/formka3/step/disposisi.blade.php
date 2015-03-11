<?php
$dis = null;
if (isset($record)) {
    $dis = $record->disposisi->first();
}
?>


<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','disposisi[id]',$dis->id)}}
<?php } ?>

<div class="form-group">
    {{ Form::label('disposisi[kepada]', 'Kepada',['class'=>'control-label col-sm-2']) }}
    <div class="col-sm-9">
        <?php $kpd = (isset($dis->kepada)) ? $dis->kepada : null; ?>
        {{ Form::text('disposisi[kepada]', $kpd, ['class' => 'form-control','required','rows'=>'8','cols'=>'20'])  }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('disposisi[isi]', 'Isi Disposisi',['class'=>'control-label col-sm-2']) }}
    <div class="col-sm-9">
        <?php $isi = (isset($dis->isi)) ? $dis->isi : null; ?>
        {{ Form::textarea('disposisi[isi]', $isi, ['class' => 'form-control ckeditor','required','rows'=>'8','cols'=>'20'])  }}
    </div>
</div>