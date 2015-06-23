
<p class="lead" style="margin-left: 8.5%">Proses dan Hasil Pendampingan Anak</p>
<div class="form-group has-primary">
    <!--{{ Form::label('ringkasan_kasus', 'Proses dan Hasil Pendampingan Anak',['class'=>'control-label col-sm-3']) }}-->
    <label class="col-sm-1"></label>
    <div class="col-sm-11">
        <?php $ctl = (isset($record->hasil_pendampingan)) ? $record->hasil_pendampingan : null; ?>
        {{ Form::textarea('form[hasil_pendampingan]', $ctl, ['class' => 'form-control ckeditor','required','rows'=>'10','cols'=>'25'])  }}
    </div>
</div>
