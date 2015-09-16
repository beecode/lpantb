<?php
$anak = null;
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','anak[id]',$anak->id)}}
<?php } ?>

<div class="form-group has-primary">
    {{ Form::label('anak[nama]', 'Nama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $anak['nama'] = (isset($anak->nama)) ? $anak->nama : null; ?>
        {{ Form::text('anak[nama]', $anak['nama'], ['class' => 'form-control','required'])  }}
    </div>

    {{ Form::label('anak[gender]', 'Gender',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $anak['gender'] = (isset($anak->gender)) ? $anak->gender : null; ?>
        {{ Form::select('anak[gender]',
                                              ['Laki-Laki' => 'Laki-Laki','Perempuan'=>'Perempuan'],
                                             $anak['gender'],
                                             ['class'=>'form-control'])
        }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('anak[umur]', 'Umur', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1">
        <?php $anak['umur'] = (isset($anak->umur)) ? $anak->umur : null; ?>
        {{ Form::input('number','anak[umur]', $anak['umur'], ['class' => 'form-control'])  }}
    </div>
    <div class="col-sm-2" style="margin-left: 0px; padding-left: 0px">
        <?php $umur_lists = ['Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Pekan' => 'Pekan', 'Hari' => 'Hari']; ?>
        <?php $anak['umur_satuan'] = (isset($anak->umur_satuan)) ? $anak->umur_satuan : null; ?>
        {{ Form::select('anak[umur_satuan]',
                                            $umur_lists ,
                                             $anak['umur_satuan'],
                                             ['class'=>'form-control','required'])
        }}
    </div>




    {{ Form::label('tgl', 'Tanggal Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 80px; ">
        <?php $anak['tanggal_lahir'] = (isset($anak->tanggal_lahir)) ? $anak->tanggal_lahir : null; ?>
        <?php
          $hari_list = [];
          $hari_list["Hari"] = "Hari";
          for ($h = 1; $h<=31; $h++){
            $hari_list[$h] = $h;
          }
        ?>
        {{ Form::select('anak[tanggal_lahir]',
                                             $hari_list ,
                                             $anak['tanggal_lahir'],
                                             ['class'=>'form-control'])
        }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 89px;">
        <?php $anak['bulan_lahir'] = (isset($anak->bulan_lahir)) ? $anak->bulan_lahir : null; ?>
        <?php
          $bulan_list = [];
          $bulan_list["Bulan"] = "Bulan";
          for ($b = 1; $b<=12; $b++){
            $bulan_list[$b] = $b;
          }
        ?>
        {{ Form::select('anak[bulan_lahir]', $bulan_list, $anak['bulan_lahir'], ['class'=>'form-control'])}}
    </div>
    <div class="col-sm-2" style="margin: 0px; padding: 0px; width: 89px;">
      <?php $anak['tahun_lahir'] = (isset($anak->tahun_lahir)) ? $anak->tahun_lahir : null; ?>
      <?php
      $year_start = 1910;
      $year_end = date("Y");
      $tahun_list = [];
      $tahun_list["Tahun"] = "Tahun";
      for ($i = $year_start; $i<=$year_end; $i++){
        $tahun_list[$i]=$i;
      }
      ?>
      {{ Form::select('anak[tahun_lahir]', $tahun_list, $anak['tahun_lahir'], ['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('anak[agama]', 'Agama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $anak['agama'] = (isset($anak->agama)) ? $anak->agama : null; ?>
        {{ Form::select('anak[agama]',
                                             $agama_lists,
                                             $anak['agama'],
                                             ['class'=>'form-control','required'])
        }}
    </div>
</div>

<?php
$la = $location_anak;
?>

<div class="form-group has-primary">
    {{ Form::label('anak[provinsi]', 'Provinsi', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['provinsi'] = (isset($la['provinsi_sel'])) ? $la['provinsi_sel'] : null; ?>
        {{ Form::select('anak[provinsi]',
                                             $la['provinsi_lists'],
                                             $pel['provinsi'],
                                             ['class'=>'form-control anak_provinsi','required'])
        }}
    </div>
    {{ Form::label('anak[kabkota]', 'Kabupaten / Kota', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['kabkota'] = (isset($la['kabkota_sel'])) ? $la['kabkota_sel'] : null; ?>
        {{ Form::select('anak[kabkota]',
                                        $la['kabkota_lists'],
                                        $pel['kabkota'],
                                        ['class'=>'form-control anak_kabkota','required'])  }}
    </div>

</div>



<div class="form-group has-primary">
    {{ Form::label('anak[kecamatan]', 'Kecamatan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['kecamatan'] = (isset($la['kecamatan_sel'])) ? $la['kecamatan_sel'] : null; ?>
        {{ Form::select('anak[kecamatan]',
                                        $la['kecamatan_lists'],
                                        $pel['kecamatan'],
                                        ['class'=>'form-control anak_kecamatan','required'])  }}
    </div>

    {{ Form::label('anak[desa]', 'Desa', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $pel['desa'] = (isset($la['desa_sel'])) ? $la['desa_sel'] : null; ?>
        {{ Form::select('anak[desa]',
                                        $la['desa_lists'],
                                        $pel['desa'],
                                        ['class'=>'form-control anak_desa','required'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('anak[alamat]', 'Alamat',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        <?php $anak['alamat'] = (isset($anak->alamat)) ? $anak->alamat : null; ?>
        {{ Form::textarea('anak[alamat]', $anak['alamat'], ['class' => 'form-control','rows'=>'2','required'])  }}
    </div>
</div>



<?php if ($form_status == "edit") { ?>
    <?php
    $contact = null;
    if (count($anak->contact_person)) {
        $contact = $anak->contact_person;
        ?>
        {{Form::input('hidden','contact[id]',$contact->id)}}
    <?php } ?>

<?php } ?>

<div class="form-group has-primary">
    {{ Form::label('contact[nama]', 'Contact Nama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $contact['nama'] = (isset($contact->nama)) ? $contact->nama : null; ?>
        {{ Form::text('contact[nama]', $contact['nama'], ['class' => 'form-control','placeholder'=>'Contact Nama'])  }}
    </div>

    {{ Form::label('contact[nama]', 'Contact Telpon', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $contact['telp'] = (isset($contact->telp)) ? $contact->telp : null; ?>
        {{ Form::text('contact[telp]', $contact['telp'], ['class' => 'form-control','placeholder'=>'Contact Telp'])  }}
    </div>
</div>

<script type="text/javascript">
    ajaxSelectLocation(
            '.anak_provinsi',
            '<?php echo URL::to("dash/location/kabkota") ?>',
            '.anak_kabkota'
            );
    ajaxSelectLocation(
            '.anak_kabkota',
            '<?php echo URL::to("dash/location/kecamatan") ?>',
            '.anak_kecamatan'
            );
    ajaxSelectLocation(
            '.anak_kecamatan',
            '<?php echo URL::to("dash/location/desa") ?>',
            '.anak_desa'
            );
</script>
