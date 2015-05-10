<?php
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','anak[id]',$anak->id)}}
<?php } else if (isset($anak->id)) { ?>
    {{Form::input('hidden','anak[id]',$anak->id)}}
<?php } ?>

<div class="form-group">
    {{ Form::label('anak[nama]', 'Nama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3 ">
        <p class="form-control-static">{{ $anak->nama }}</p>
    </div>
</div>
<div class="form-group">
    {{ Form::label('anak[nama]', 'Gender', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3 ">
        <p class="form-control-static">{{ $anak->gender }}</p>
    </div>
</div>

<div class="form-group">
    {{ Form::label('anak[jenis_kasus]', 'Jenis Kasus', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3 ">
        <?php $c = 1; ?>
        <?php
        foreach ($jenis_kasus as $jk) {
            if ($jk->other == "F") {
                if ($form_status == "edit") {
                    $checked = [];
                    foreach ($anak->jenis_kasus as $vjk) {
                        if ($vjk->id == $jk->id) {
                            $checked = ['checked' => 'checked'];
                        }
                    }
                    ?>
                    <div class="checkbox">
                        {{ Form::checkbox('jenis_kasus[def][][id]', $jk->id, $checked) }}
                        {{$c++}}. {{$jk->jenis}}
                    </div>
                <?php } else { ?>
                    <div class="checkbox">
                        {{ Form::checkbox('jenis_kasus[def][][id]', $jk->id) }}
                        {{$c++}}. {{$jk->jenis}}
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php
        $ovjk = null;
        if ($form_status == "edit") {
            foreach ($anak->jenis_kasus as $vjk) {
                if ($vjk->other == "T") {
                    $ovjk = $vjk;
                }
            }
            $cko = null;
            $vko = null;
            ?>

            <?php if (!is_null($ovjk)) { ?>
                {{Form::input('hidden','jenis_kasus[other][id]',$ovjk->id)}}
                <?php $cko = ['checked' => 'checked'] ?>
                <?php $vko = $ovjk->jenis; ?>
            <?php } ?>
            <div class="checkbox">
                {{ Form::checkbox('jenis_kasus[other][check]', true, $cko) }}
                8. Lain - Lain
                <div style="margin-top: 10px;">
                    {{Form::text('jenis_kasus[other][value]',$vko,['class'=>'form-control lain','placeholder'=>'Lain-Lain'])}}
                </div>
            </div>
        <?php } else { ?>
            <div class="checkbox">
                {{ Form::checkbox('jenis_kasus[other][check]', true) }}
                8. Lain - Lain
                <div style="margin-top: 10px;">
                    {{Form::text('jenis_kasus[other][value]','',['class'=>'form-control lain','placeholder'=>'Lain-Lain'])}}
                </div>
            </div>
        <?php } ?>

    </div>
</div>




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
