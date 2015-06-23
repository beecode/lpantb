<?php
$gfis = null;
$fisik = null;
if (isset($record)) {
    $anak = $record->anak->first();
    if ($anak->gambaran_fisik)
        $gfis = $anak->gambaran_fisik->first();
}
?>

<?php if ($form_status == "edit") { ?>
    <?php if (isset($gfis->id)) { ?>
        {{Form::input('hidden','gambaran[id]',$gfis->id)}}
    <?php } ?>
<?php } ?>

<div class="form-group has-primary">
    {{ Form::label('fisik[tinggi]', 'Tinggi', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $fisik['tinggi'] = (isset($gfis->tinggi)) ? $gfis->tinggi : null; ?>
        {{ Form::text('fisik[tinggi]', $fisik['tinggi'], ['class' => 'form-control'])  }}
    </div>
    {{ Form::label('fisik[berat]', 'Berat', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $fisik['berat'] = (isset($gfis->berat)) ? $gfis->berat : null; ?>
        {{ Form::text('fisik[berat]', $fisik['berat'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('fisik[warna_kulit]', 'Warna Kulit', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $fisik['warna_kulit'] = (isset($gfis->warna_kulit)) ? $gfis->warna_kulit : null; ?>
        {{ Form::text('fisik[warna_kulit]', $fisik['warna_kulit'], ['class' => 'form-control'])  }}
    </div>
    {{ Form::label('fisik[rambut]', 'Rambut', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $fisik['rambut'] = (isset($gfis->rambut)) ? $gfis->rambut : null; ?>
        {{ Form::text('fisik[rambut]', $fisik['rambut'], ['class' => 'form-control'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('fisik[tanda_lain]', 'Tanda Lainnya', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        <?php $fisik['tanda_lain'] = (isset($gfis->tanda_lain)) ? $gfis->tanda_lain : null; ?>
        {{ Form::textarea('fisik[tanda_lain]', $fisik['tanda_lain'], ['class' => 'form-control','rows'=>'2'])  }}
    </div>
</div>
