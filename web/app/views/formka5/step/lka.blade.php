<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','form[id]',$record->id)}}
<?php } ?>

{{Form::input('hidden','form[nama]','ka5')}}
<div class="form-group">
    {{ Form::label('lka', 'No LKA',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lka = (isset($record->no_lka)) ? $record->no_lka : null; ?>
        {{ Form::text('form[no_lka]', $lka, ['class' => 'form-control','required'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-2 control-label']) }}

    <?php
    $fday = "";
    $fmonth = "";
    $fyear = "";
    if (isset($record->tanggal)) {
        $ar = \App\Helpers\DateHelper::toArray($record->tanggal);
        $fday = $ar['day'];
        $fmonth = $ar['month'];
        $fyear = $ar['year'];
    }
    ?>
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $fday = (isset($record->tanggal)) ? date('d', $record->tanggal) : null;  ?>
        {{ Form::text('form[tanggal][day]', $fday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $fmonth = (isset($record->tanggal)) ? date('m', $record->tanggal) : null;  ?>
        {{ Form::text('form[tanggal][month]', $fmonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $fyear = (isset($record->tanggal)) ? date('Y', $record->tanggal) : null;  ?>
        {{ Form::text('form[tanggal][year]', $fyear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>