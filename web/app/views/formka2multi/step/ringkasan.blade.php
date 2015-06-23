<div class="form-group has-primary">
    {{ Form::label('ringkasan_kasus', 'Ringkasan Kasus',['class'=>'control-label col-sm-2']) }}
    <div class="col-sm-9">
        <?php $rk = (isset($record->ringkasan_kasus)) ? $record->ringkasan_kasus : null; ?>
        {{ Form::textarea('form[ringkasan]', $rk, ['class' => 'form-control ckeditor','required','rows'=>'8','cols'=>'20'])  }}
    </div>
</div>

<!--<div class="form-group has-primary">
        {{ Form::label('penerima[sign]', 'Penerima Laporan', ['class'=>'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('penerima[sign]', null, ['class' => 'form-control'])  }}
        </div>
</div>

<div class="form-group has-primary">
        {{ Form::label('pelapor[sign]', 'Pelapor / Pengadu', ['class'=>'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('pelapor[sign]', null, ['class' => 'form-control'])  }}
        </div>
</div>
<br>-->
