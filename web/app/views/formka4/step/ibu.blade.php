<?php
$ibu = null;
$loc_ibu = App\Helpers\LocationHelper::location();
if (!is_null($anak->keluarga)) {
    $keluarga = $anak->keluarga;
    if (!is_null($keluarga->ibu)) {
        $ibu = $keluarga->ibu;
        $loc_ibu = App\Helpers\LocationHelper::location($ibu->desa->id);
    }
}
?>

<?php if ($form_status == "edit") { ?>
    <?php if (!is_null($ibu)) { ?>
        {{Form::input('hidden','ibu[id]',$ibu->id)}}
    <?php } ?>
<?php } ?>

<div class="form-group has-primary">
    <label class="control-label" style="margin-left: 5.6%;">
        <p class="lead">Identitas Ibu</p>
    </label>
</div>

<div class="form-group has-primary">
    {{ Form::label('ibu[nama]', 'Nama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ib['nama'] = (isset($ibu->nama)) ? $ibu->nama : null; ?>
        {{ Form::text('ibu[nama]', $ib['nama'], ['class' => 'form-control'])  }}
    </div>
    {{ Form::label('ibu[telp]', 'Telpon', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ib['telp'] = (isset($ibu->telp)) ? $ibu->telp : null; ?>
        {{ Form::text('ibu[telp]', $ib['telp'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('ibu[tempat_lahir]', 'Tempat Lahir', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ib['tempat_lahir'] = (isset($ibu->tempat_lahir)) ? $ibu->tempat_lahir : null; ?>
        {{ Form::text('ibu[tempat_lahir]', $ib['tempat_lahir'], ['class' => 'form-control'])  }}
    </div>

    <?php
    $aday = "";
    $amonth = "";
    $ayear = "";
    if (isset($ibu->tanggal_lahir)) {
        $ar = \App\Helpers\DateHelper::toArray($ibu->tanggal_lahir);
        $aday = $ar['day'];
        $amonth = $ar['month'];
        $ayear = $ar['year'];
    }
    ?>

    {{ Form::label('tgl', 'Tanggal Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $aday = (isset($Ibu->tanggal_lahir)) ? date('d', $Ibu->tanggal_lahir) : null;     ?>
        {{ Form::text('ibu[tanggal_lahir][day]', $aday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $amonth = (isset($Ibu->tanggal_lahir)) ? date('m', $Ibu->tanggal_lahir) : null;     ?>
        {{ Form::text('ibu[tanggal_lahir][month]', $amonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $ayear = (isset($Ibu->tanggal_lahir)) ? date('Y', $Ibu->tanggal_lahir) : null;     ?>
        {{ Form::text('ibu[tanggal_lahir][year]', $ayear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('ibu[pendidikan]', 'Pendidikan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ib['pendidikan'] = (isset($ibu->pendidikan_terakhir)) ? $ibu->pendidikan_terakhir : null; ?>
        {{ Form::text('ibu[pendidikan]', $ib['pendidikan'], ['class' => 'form-control','placeholder'=>'Pendidikan'])  }}
    </div>

    {{ Form::label('ibu[pekerjaan]', 'Pekerjaan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ib['pekerjaan'] = (isset($ibu->pekerjaan)) ? $ibu->pekerjaan : null; ?>
        {{ Form::text('ibu[pekerjaan]', $ib['pekerjaan'], ['class' => 'form-control','placeholder'=>'Pekerjaan'])  }}
    </div>
</div>

<?php
$lib = $loc_ibu;
?>

<div class="form-group has-primary">
    {{ Form::label('ibu[provinsi]', 'Provinsi', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lb['provinsi'] = (isset($lib['provinsi_sel'])) ? $lib['provinsi_sel'] : null; ?>
        {{ Form::select('ibu[provinsi]',
                                             $lib['provinsi_lists'],
                                             $lb['provinsi'],
                                             ['class'=>'form-control ibu_provinsi'])
        }}
    </div>
    {{ Form::label('ibu[kabkota]', 'Kabupaten / Kota', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lb['kabkota'] = (isset($lib['kabkota_sel'])) ? $lib['kabkota_sel'] : null; ?>
        {{ Form::select('ibu[kabkota]',
                                        $lib['kabkota_lists'],
                                        $lb['kabkota'],
                                        ['class'=>'form-control ibu_kabkota'])  }}
    </div>

</div>



<div class="form-group has-primary">
    {{ Form::label('ibu[kecamatan]', 'Kecamatan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lb['kecamatan'] = (isset($lib['kecamatan_sel'])) ? $lib['kecamatan_sel'] : null; ?>
        {{ Form::select('ibu[kecamatan]',
                                        $lib['kecamatan_lists'],
                                        $lb['kecamatan'],
                                        ['class'=>'form-control ibu_kecamatan'])  }}
    </div>

    {{ Form::label('ibu[desa]', 'Desa', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $lb['desa'] = (isset($lib['desa_sel'])) ? $lib['desa_sel'] : null; ?>
        {{ Form::select('ibu[desa]',
                                        $lib['desa_lists'],
                                        $lb['desa'],
                                        ['class'=>'form-control ibu_desa'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('ibu[alamat]', 'Alamat',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        <?php $ib['alamat'] = (isset($ibu->alamat)) ? $ibu->alamat : null; ?>
        {{ Form::textarea('ibu[alamat]', $ib['alamat'], ['class' => 'form-control','rows'=>'2'])  }}
    </div>
</div>

<script type="text/javascript">
    ajaxSelectLocation(
            '.ibu_provinsi',
            '<?php echo URL::to("dash/location/kabkota") ?>',
            '.ibu_kabkota'
            );
    ajaxSelectLocation(
            '.ibu_kabkota',
            '<?php echo URL::to("dash/location/kecamatan") ?>',
            '.ibu_kecamatan'
            );
    ajaxSelectLocation(
            '.ibu_kecamatan',
            '<?php echo URL::to("dash/location/desa") ?>',
            '.ibu_desa'
            );
</script>
