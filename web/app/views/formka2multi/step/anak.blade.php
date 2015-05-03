<?php
$anak = null;
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','anak[id]',$anak->id)}}
<?php } ?>

<div class="form-group">
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

<div class="form-group">
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



    <?php
    $aday = "";
    $amonth = "";
    $ayear = "";
    if (isset($anak->tanggal_lahir)) {
        $ar = \App\Helpers\DateHelper::toArray($anak->tanggal_lahir);
        $aday = $ar['day'];
        $amonth = $ar['month'];
        $ayear = $ar['year'];
    }
    ?>

    {{ Form::label('tgl', 'Tanggal Lahir',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1" style="margin-right:  0px; padding-right: 0px; width: 70px; ">
        <?php // $aday = (isset($anak->tanggal_lahir)) ? date('d', $anak->tanggal_lahir) : null; ?>
        {{ Form::text('anak[tanggal_lahir][day]', $aday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $amonth = (isset($anak->tanggal_lahir)) ? date('m', $anak->tanggal_lahir) : null; ?>
        {{ Form::text('anak[tanggal_lahir][month]', $amonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $ayear = (isset($anak->tanggal_lahir)) ? date('Y', $anak->tanggal_lahir) : null; ?>
        {{ Form::text('anak[tanggal_lahir][year]', $ayear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>

<div class="form-group">
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

<div class="form-group">
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



<div class="form-group">
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


<div class="form-group">
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

<div class="form-group">
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
            '<?php echo URL::to("lpantb/location/kabkota") ?>',
            '.anak_kabkota'
            );
    ajaxSelectLocation(
            '.anak_kabkota',
            '<?php echo URL::to("lpantb/location/kecamatan") ?>',
            '.anak_kecamatan'
            );
    ajaxSelectLocation(
            '.anak_kecamatan',
            '<?php echo URL::to("lpantb/location/desa") ?>',
            '.anak_desa'
            );
</script>