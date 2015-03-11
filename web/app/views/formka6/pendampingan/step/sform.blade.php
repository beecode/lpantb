

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','pendamping[id]', $data->id)}}
<?php } ?>

{{Form::input('hidden','anak[id]', $anak->id)}}

<div class="form-group">
    {{ Form::label('tgl', 'Tanggal',['class'=>'col-sm-3 control-label']) }}

    <?php
    $fday = "";
    $fmonth = "";
    $fyear = "";
    if (isset($data->tanggal)) {
        $ar = \App\Helpers\DateHelper::toArray($data->tanggal);
        $fday = $ar['day'];
        $fmonth = $ar['month'];
        $fyear = $ar['year'];
    }
    ?>
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $fday = (isset($data->tanggal)) ? date('d', $data->tanggal) : null;  ?>
        {{ Form::text('pendamping[tanggal][day]', $fday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $fmonth = (isset($data->tanggal)) ? date('m', $data->tanggal) : null;  ?>
        {{ Form::text('pendamping[tanggal][month]', $fmonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $fyear = (isset($data->tanggal)) ? date('Y', $data->tanggal) : null;  ?>
        {{ Form::text('pendamping[tanggal][year]', $fyear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Bentuk Pendampingan',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['bentuk'] = (isset($data->bentuk)) ? $data->bentuk : null; ?>
        {{ Form::text('pendamping[bentuk]', $pen['bentuk'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Tempat',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['tempat'] = (isset($data->tempat)) ? $data->tempat : null; ?>
        {{ Form::text('pendamping[tempat]', $pen['tempat'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Pelaksana',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['pelaksana'] = (isset($data->pelaksana)) ? $data->pelaksana : null; ?>
        {{ Form::text('pendamping[pelaksana]', $pen['pelaksana'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Hasil Yang Dicapai',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['hasil'] = (isset($data->hasil)) ? $data->hasil : null; ?>
        {{ Form::text('pendamping[hasil]', $pen['hasil'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Rencana Tindak Lanjut',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['rencana'] = (isset($data->rencana)) ? $data->rencana : null; ?>
        {{ Form::text('pendamping[rencana]', $pen['rencana'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Keterangan',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $pen['ket'] = (isset($data->keterangan)) ? $data->keterangan : null; ?>
        {{ Form::text('pendamping[keterangan]', $pen['ket'], ['class' => 'form-control'])  }}
    </div>
</div>