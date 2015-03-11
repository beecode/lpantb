<div class="form-group">
    {{ Form::label('uraian_kasus', 'Uraian Singkat Kasus',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-9">
        <?php $ctl = (isset($record->uraian_kasus)) ? $record->uraian_kasus : null; ?>
        {{ Form::textarea('form[uraian_kasus]', $ctl, ['class' => 'form-control ckeditor','required','rows'=>'4','cols'=>'20'])  }}
    </div>
</div>

