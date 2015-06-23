
<?php
$form = null;
?>

<div class="form-group has-primary">
    {{ Form::label('form[ha]', 'Rekomendasi',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-9">
        <?php $form['rekomendasi'] = (isset($record->rekomendasi)) ? $record->rekomendasi : null; ?>
        {{ Form::textarea('form[rekomendasi]', $form['rekomendasi'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('catatan', 'Catatan',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-9">
        <?php $ct = (isset($record->catatan)) ? $record->catatan : null; ?>
        {{ Form::textarea('form[catatan]', $ct, ['class' => 'form-control ckeditor','rows'=>'2'])  }}
    </div>
</div>
