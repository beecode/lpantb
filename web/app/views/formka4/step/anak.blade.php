<?php
if (isset($record)) {
    $anak = $record->anak->first();
}
?>

{{Form::input('hidden','anak[id]',$anak->id)}}

<div class="form-group">
    {{ Form::label('anak[nama]', 'Nama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['nama'] = (isset($anak->nama)) ? $anak->nama : null; ?>
        {{ Form::text('anak[nama]', $ank['nama'], ['class' => 'form-control','required'])  }}
    </div>

    {{ Form::label('anak[gender]', 'Gender',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['gender'] = (isset($anak->gender)) ? $anak->gender : null; ?>
        {{ Form::select('anak[gender]',
                                              ['Laki-Laki' => 'Laki-Laki','Perempuan'=>'Perempuan'],
                                             $ank['gender'],
                                             ['class'=>'form-control'])
        }}
    </div>
</div>



<div class="form-group">
    {{ Form::label('anak[umur]', 'Umur', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-1">
        <?php $ank['umur'] = (isset($anak->umur)) ? $anak->umur : null; ?>
        {{ Form::input('number','anak[umur]', $ank['umur'], ['class' => 'form-control'])  }}
    </div>

    <div class="col-sm-2" style="margin-left: 0px; padding-left: 0px">
        <?php $umur_lists = ['Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Pekan' => 'Pekan', 'Hari' => 'Hari']; ?>
        <?php $ank['umur_satuan'] = (isset($anak->umur_satuan)) ? $anak->umur_satuan : null; ?>
        {{ Form::select('anak[umur_satuan]',
                                            $umur_lists ,
                                             $ank['umur_satuan'],
                                             ['class'=>'form-control','required'])
        }}
    </div>

    {{ Form::label('anak[agama]', 'Agama', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['agama'] = (isset($anak->agama)) ? $anak->agama : null; ?>
        {{ Form::select('anak[agama]',
                                             $agama_lists,
                                             $ank['agama'],
                                             ['class'=>'form-control','required'])
        }}
    </div>

</div>

<div class="form-group">
    {{ Form::label('anak[tempat_lahir]', 'Tempat Lahir', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['tempat_lahir'] = (isset($anak->tempat_lahir)) ? $anak->tempat_lahir : null; ?>
        {{ Form::input('text','anak[tempat_lahir]', $ank['tempat_lahir'], ['class' => 'form-control'])  }}
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
        <?php // $aday = (isset($anak->tanggal_lahir)) ? date('d', $anak->tanggal_lahir) : null;   ?>
        {{ Form::text('anak[tanggal_lahir][day]', $aday, ['class' => 'form-control','placeholder'=>'Hari'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $amonth = (isset($anak->tanggal_lahir)) ? date('m', $anak->tanggal_lahir) : null;   ?>
        {{ Form::text('anak[tanggal_lahir][month]', $amonth, ['class' => 'form-control','placeholder'=>'Bulan'])  }}
    </div>
    <div class="col-sm-1" style="margin: 0px; padding: 0px; width: 65px;">
        <?php // $ayear = (isset($anak->tanggal_lahir)) ? date('Y', $anak->tanggal_lahir) : null;   ?>
        {{ Form::text('anak[tanggal_lahir][year]', $ayear, ['class' => 'form-control','placeholder'=>'Tahun'])  }}
    </div>
</div>


<div class="form-group">
    {{ Form::label('anak[pendidikan]', 'Pendidikan', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['pendidikan'] = (isset($anak->pendidikan)) ? $anak->pendidikan : null; ?>
        <?php
        $pendidikan_list = [
            'Belum Sekolah' => 'Belum Sekolah',
            'Tidak Sekolah' => 'Tidak Sekolah',
            'Putus Sekolah' => 'Putus Sekolah',
            'TK' => 'TK',
            'SD/MI' => 'SD/MI',
            'SMP/MTS' => 'SMP/MTS',
            'SMA/SMK/MA' => 'SMA/SMK/MA',
        ];
        ?>
        {{ Form::select('anak[pendidikan]',
                                            $pendidikan_list ,
                                             $ank['pendidikan'],
                                             ['class'=>'form-control','required'])
        }}
    </div>


    {{ Form::label('anak[suku]', 'Suku', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['suku'] = (isset($anak->suku)) ? $anak->suku : null; ?>
        {{ Form::text('anak[suku]', $ank['suku'], ['class' => 'form-control','placeholder'=>'Suku'])  }}
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
        <?php $ank['alamat'] = (isset($anak->alamat)) ? $anak->alamat : null; ?>
        {{ Form::textarea('anak[alamat]', $ank['alamat'], ['class' => 'form-control','rows'=>'2','required'])  }}
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
    {{ Form::label('anak[ke]', 'Anak Ke-', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['anak_ke'] = (isset($anak->anak_ke)) ? $anak->anak_ke : null; ?>
        {{ Form::input('number','anak[anak_ke]', $ank['anak_ke'], ['class' => 'form-control','placeholder'=>'Urutan Anak'])  }}
    </div>

    {{ Form::label('anak[jumlah_saudara]', 'Jumlah Saudara', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php $ank['jumlah_saudara'] = (isset($anak->jumlah_saudara)) ? $anak->jumlah_saudara : null; ?>
        {{ Form::input('number','anak[jumlah_saudara]', $ank['jumlah_saudara'], ['class' => 'form-control','placeholder'=>'Jumlah Saudara'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('anak[ke]', 'Akta Kelahiran', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-5">
        <label class="radio">
            <?php
            $ank['akta']['F'] = false;
            $ank['akta']['T'] = false;
            if (isset($anak->akta_kelahiran)) {
                $tf = $anak->akta_kelahiran;
                if ($tf == "T") {
                    $ank['akta']['F'] = False;
                    $ank['akta']['T'] = True;
                } else {
                    $ank['akta']['F'] = True;
                    $ank['akta']['T'] = False;
                }
            }
            ?>
            {{ Form::radio('anak[akta_kelahiran]', 'T',$ank['akta']['T']);}} Punya
            &nbsp;&nbsp;
            {{ Form::radio('anak[akta_kelahiran]', 'F',$ank['akta']['F']);}} Tidak Punya
        </label>
    </div>
</div>
<div class="form-group">
    {{ Form::label('anak[ke]', 'Disabilitas', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        <?php
        $ank['dis']['F'] = false;
        $ank['dis']['T'] = false;
        if (isset($anak->disabilitas)) {
            $tf = $anak->disabilitas;
            if ($tf == "T") {
                $ank['dis']['F'] = False;
                $ank['dis']['T'] = True;
            } else {
                $ank['dis']['F'] = True;
                $ank['dis']['T'] = False;
            }
        }
        ?>
        <label class="radio">
            {{ Form::radio('anak[disabilitas]', 'F',$ank['dis']['F'])}} Tidak
        </label>
        <label class="radio">
            {{ Form::radio('anak[disabilitas]', 'T',$ank['dis']['T'])}} Ya, Sebutkan
        </label>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2"></label>
    <div class="col-sm-3">
        <?php $ank['disabilitas_keterangan'] = (isset($anak->disabilitas_keterangan)) ? $anak->disabilitas_keterangan : null; ?>
        {{Form::text('anak[disabilitas_keterangan]',$ank['disabilitas_keterangan'],['class'=>'form-control col-sm-3','placeholder'=>'Sebutkan Disabilitas'])}}
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
