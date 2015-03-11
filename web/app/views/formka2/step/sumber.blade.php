<?php
$sumber = null;
if (isset($record)) {
    $anak = $record->anak->first();
    $sumber = $anak->sumber_informasi->first();
}
?>

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','sumber[id]',$sumber->id)}}
<?php } ?>

<div class="form-group">
    {{ Form::label('sumber[sumber]', 'Sumber',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <div class="typeahead-basic">
            <?php $sum['sumber'] = (isset($sumber->sumber)) ? $sumber->sumber : null; ?>
            {{ Form::text('sumber[sumber]', $sum['sumber'], ['class' => 'form-control typeahead','required'])  }}
        </div>
    </div>



    <?php
    $sday = "";
    $smonth = "";
    $syear = "";
    if (isset($sumber->tanggal)) {
        $ar = \App\Helpers\DateHelper::toArray($sumber->tanggal);
        $sday = $ar['day'];
        $smonth = $ar['month'];
        $syear = $ar['year'];
    }
    ?>
    {{ Form::label('tgl', 'Tanggal Informasi',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $sday = (isset($sumber->tanggal_informasi)) ? date('d', $sumber->tanggal_informasi) : null; ?>
        {{ Form::text('sumber[tanggal_informasi][day]', $sday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $smonth = (isset($sumber->tanggal_informasi)) ? date('m', $sumber->tanggal_informasi) : null; ?>
        {{ Form::text('sumber[tanggal_informasi][month]', $smonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $syear = (isset($sumber->tanggal_informasi)) ? date('Y', $sumber->tanggal_informasi) : null; ?>
        {{ Form::text('sumber[tanggal_informasi][year]', $syear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('sumber[dasar_rujukan]', 'Dasar Rujukan',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        <?php $sum['dasar_rujukan'] = (isset($sumber->dasar_rujukan)) ? $sumber->dasar_rujukan : null; ?>
        {{ Form::text('sumber[dasar_rujukan]', $sum['dasar_rujukan'], ['class' => 'form-control','required'])  }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('sumber[contact_person]', 'Contact Person',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $sum['contact_person'] = (isset($sumber->contact_person)) ? $sumber->contact_person : null; ?>
        {{ Form::text('sumber[contact_person]', $sum['contact_person'], ['class' => 'form-control','required'])  }}
    </div>

    {{ Form::label('sumber[telp]', 'No Telpon',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $sum['telp'] = (isset($sumber->telp)) ? $sumber->telp : null; ?>
        {{ Form::text('sumber[telp]', $sum['telp'], ['class' => 'form-control','required'])  }}
    </div>
</div>


<script type="text/javascript">
    var nbaTeams = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '<?php echo URL::to('lpantb/service/sumber/list') ?>'
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