<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
<?php } ?>

{{Form::input('hidden','form[nama]','ka6')}}
<div class="form-group">
    {{ Form::label('lka', 'No LKA',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lka = (isset($record->no_lka)) ? $record->no_lka : null; ?>
        {{ Form::text('form[no_lka]', $lka, ['class' => 'form-control','required'])  }}
    </div>
</div>