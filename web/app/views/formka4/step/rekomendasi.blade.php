
<?php
$form = null;
?>

<div class="form-group">
    {{ Form::label('form[ha]', 'Rekomendasi',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-9">
        <?php $form['rekomendasi'] = (isset($record->rekomendasi)) ? $record->rekomendasi : null; ?>
        {{ Form::textarea('form[rekomendasi]', $form['rekomendasi'], ['class' => 'form-control ckeditor','rows'=>'5'])  }}
    </div>
</div>