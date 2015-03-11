

<?php
$psiko = null;
if ($anak) {
    $psiko = $anak->kondisi_psikososial;
}
?>

<?php if ($form_status == "edit") { ?>
    <?php if (!is_null($psiko)) { ?>
        {{Form::input('hidden','psiko[id]', $psiko->id)}}
    <?php } ?>
<?php } ?>

<div class="form-group">
    {{ Form::label('psiko[gka]', 'Riwayat Keluarga dan Pengasuhan Anak',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $psi['rk'] = (isset($psiko->rk)) ? $psiko->rk : null; ?>
        {{ Form::textarea('psiko[rk]', $psi['rk'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>


<div class="form-group">
    {{ Form::label('psiko[rp]', 'Riwayat Pendidikan Anak',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $psi['rp'] = (isset($psiko->rp)) ? $psiko->rp : null; ?>
        {{ Form::textarea('psiko[rp]', $psi['rp'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('psiko[ha]', 'Kondisi Mental Psikologis',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $psi['km'] = (isset($psiko->km)) ? $psiko->km : null; ?>
        {{ Form::textarea('psiko[km]', $psi['km'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('psiko[ks]', 'Kondisi Sosial',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $psi['ks'] = (isset($psiko->ks)) ? $psiko->ks : null; ?>
        {{ Form::textarea('psiko[ks]', $psi['ks'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

