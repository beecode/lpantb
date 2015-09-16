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

<div class="form-group has-primary">
    {{ Form::label('sumber[sumber]', 'Sumber',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <div class="typeahead-basic">
            <?php $sum['sumber'] = (isset($sumber->sumber)) ? $sumber->sumber : null; ?>
            {{ Form::text('sumber[sumber]', $sum['sumber'], ['class' => 'form-control typeahead','required'])  }}
        </div>
    </div>



    {{ Form::label('tgl', 'Tanggal Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 80px; ">
        <?php $sumber['tanggal_lahir'] = (isset($sumber->tanggal_lahir)) ? $sumber->tanggal_lahir : null; ?>
        <?php
          $hari_list = [];
          $hari_list["Hari"] = "Hari";
          for ($h = 1; $h<=31; $h++){
            $hari_list[$h] = $h;
          }
        ?>
        {{ Form::select('sumber[tanggal_lahir]',
                                             $hari_list ,
                                             $sumber['tanggal_lahir'],
                                             ['class'=>'form-control'])
        }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 89px;">
        <?php $sumber['bulan_lahir'] = (isset($sumber->bulan_lahir)) ? $sumber->bulan_lahir : null; ?>
        <?php
          $bulan_list = [];
          $bulan_list["Bulan"] = "Bulan";
          for ($b = 1; $b<=12; $b++){
            $bulan_list[$b] = $b;
          }
        ?>
        {{ Form::select('sumber[bulan_lahir]', $bulan_list, $sumber['bulan_lahir'], ['class'=>'form-control'])}}
    </div>
    <div class="col-sm-2" style="margin: 0px; padding: 0px; width: 89px;">
      <?php $sumber['tahun_lahir'] = (isset($sumber->tahun_lahir)) ? $sumber->tahun_lahir : null; ?>
      <?php
      $year_start = 1910;
      $year_end = date("Y");
      $tahun_list = [];
      $tahun_list["Tahun"] = "Tahun";
      for ($i = $year_start; $i<=$year_end; $i++){
        $tahun_list[$i]=$i;
      }
      ?>
      {{ Form::select('sumber[tahun_lahir]', $tahun_list, $sumber['tahun_lahir'], ['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('sumber[dasar_rujukan]', 'Dasar Rujukan',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        <?php $sum['dasar_rujukan'] = (isset($sumber->dasar_rujukan)) ? $sumber->dasar_rujukan : null; ?>
        {{ Form::text('sumber[dasar_rujukan]', $sum['dasar_rujukan'], ['class' => 'form-control','required'])  }}
    </div>
</div>
<div class="form-group has-primary">
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
        remote: '<?php echo URL::to('dash/service/sumber/list') ?>'
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
