<?php
$pelapor = null;
if (isset($record)) {
    $anak = $record->anak->first();
    $pelapor = $anak->pelapor->first();
}
?>

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','pelapor[id]',$pelapor->id)}}
<?php } ?>

<div class="form-group has-primary">
    {{ Form::label('pelapor[nama]', 'Nama',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3 ">
        <div class="typeahead-basic">
            <?php $pel['nama'] = (isset($pelapor->nama)) ? $pelapor->nama : null; ?>
            {{ Form::text('pelapor[nama]', $pel['nama'], ['class' => 'form-control typeahead','required'])  }}
        </div>
    </div>

    {{ Form::label('pelapor[gender]', 'Gender',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['gender'] = (isset($pelapor->gender)) ? $pelapor->gender : null; ?>
        {{ Form::select('pelapor[gender]',
                                             ['Laki-Laki' => 'Laki-Laki','Perempuan'=>'Perempuan'],
                                            $pel['gender'] ,
                                             ['class'=>'form-control','required'])
        }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('pelapor[tempat_lahir]', 'Tempat Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['tempat_lahir'] = (isset($pelapor->tempat_lahir)) ? $pelapor->tempat_lahir : null; ?>
        {{ Form::text('pelapor[tempat_lahir]', $pel['tempat_lahir'], ['class' => 'form-control'])  }}
    </div>



    <?php
    $pday = "";
    $pmonth = "";
    $pyear = "";
    if (isset($pelapor->tanggal_lahir)) {
        $ar = \App\Helpers\DateHelper::toArray($pelapor->tanggal_lahir);
        $pday = $ar['day'];
        $pmonth = $ar['month'];
        $pyear = $ar['year'];
    }
    ?>

    {{ Form::label('tgl', 'Tanggal Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $pday = (isset($pelapor->tanggal_lahir)) ? date('d', $pelapor->tanggal_lahir) : null; ?>
        {{ Form::text('pelapor[tanggal_lahir][day]', $pday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $pmonth = (isset($pelapor->tanggal_lahir)) ? date('m', $pelapor->tanggal_lahir) : null; ?>
        {{ Form::text('pelapor[tanggal_lahir][month]', $pmonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $pyear = (isset($pelapor->tanggal_lahir)) ? date('Y', $pelapor->tanggal_lahir) : null; ?>
        {{ Form::text('pelapor[tanggal_lahir][year]', $pyear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('pelapor[agama]', 'Agama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['agama'] = (isset($pelapor->agama)) ? $pelapor->agama : null; ?>
        {{ Form::select('pelapor[agama]',
                                             $agama_lists,
                                             $pel['agama'],
                                             ['class'=>'form-control','required'])
        }}
    </div>
    {{ Form::label('pelapor[pekerjaan]', 'Pekerjaan',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['pekerjaan'] = (isset($pelapor->pekerjaan)) ? $pelapor->pekerjaan : null; ?>
        {{ Form::text('pelapor[pekerjaan]', $pel['pekerjaan'], ['class' => 'form-control','required'])  }}
    </div>
</div>

<?php
$lp = $location_pelapor;
?>

<div class="form-group has-primary">
    {{ Form::label('pelapor[provinsi]', 'Provinsi', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['provinsi'] = (isset($lp['provinsi_sel'])) ? $lp['provinsi_sel'] : null; ?>
        {{ Form::select('pelapor[provinsi]',
                                             $lp['provinsi_lists'],
                                             $pel['provinsi'],
                                             ['class'=>'form-control pelapor_provinsi','required'])
        }}
    </div>

    {{ Form::label('pelapor[kabkota]', 'Kabupaten / Kota', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['kabkota'] = (isset($lp['kabkota_sel'])) ? $lp['kabkota_sel'] : null; ?>
        {{ Form::select('pelapor[kabkota]',
                                        $lp['kabkota_lists'],
                                        $pel['kabkota'],
                                        ['class'=>'form-control pelapor_kabkota','required'])  }}
    </div>


</div>



<div class="form-group has-primary">
    {{ Form::label('pelapor[kecamatan]', 'Kecamatan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['kecamatan'] = (isset($lp['kecamatan_sel'])) ? $lp['kecamatan_sel'] : null; ?>
        {{ Form::select('pelapor[kecamatan]',
                                        $lp['kecamatan_lists'],
                                        $pel['kecamatan'],
                                        ['class'=>'form-control pelapor_kecamatan','required'])  }}
    </div>

    {{ Form::label('pelapor[desa]', 'Desa', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['desa'] = (isset($lp['desa_sel'])) ? $lp['desa_sel'] : null; ?>
        {{ Form::select('pelapor[desa]',
                                        $lp['desa_lists'],
                                        $pel['desa'],
                                        ['class'=>'form-control pelapor_desa','required'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('pelapor[alamat]', 'Alamat',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['alamat'] = (isset($pelapor->alamat)) ? $pelapor->alamat : null; ?>
        {{ Form::textarea('pelapor[alamat]', $pel['alamat'], ['class' => 'form-control','rows'=>'4','required'])  }}
    </div>

    {{ Form::label('pelapor[telp]', 'No Telpon', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['telp'] = (isset($pelapor->telp)) ? $pelapor->telp : null; ?>
        {{ Form::text('pelapor[telp]', $pel['telp'], ['class' => 'form-control','required'])  }}
    </div>
</div>


<script type="text/javascript">
    ajaxSelectLocation(
            '.pelapor_provinsi',
            '<?php echo URL::to("dash/location/kabkota") ?>',
            '.pelapor_kabkota'
            );
    ajaxSelectLocation(
            '.pelapor_kabkota',
            '<?php echo URL::to("dash/location/kecamatan") ?>',
            '.pelapor_kecamatan'
            );
    ajaxSelectLocation(
            '.pelapor_kecamatan',
            '<?php echo URL::to("dash/location/desa") ?>',
            '.pelapor_desa'
            );</script>

<script type="text/javascript">
    var nbaTeams = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '<?php echo URL::to('dash/service/pelapor/list') ?>'
    });

    nbaTeams.initialize();

    $('.typeahead-basic .typeahead').typeahead({
        highlight: true
    },
    {
        name: 'nba-teams',
        displayKey: 'nama',
        source: nbaTeams.ttAdapter(),
    });
</script>
