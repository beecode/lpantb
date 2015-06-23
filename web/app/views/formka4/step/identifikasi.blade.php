
<?php
$masalah = null;
if ($anak) {
//    $anak = $record->anak->first();
    $masalah = $anak->identifikasi_masalah;
}
?>

<?php if ($form_status == "edit") { ?>
    <?php if (!is_null($masalah)) { ?>
        {{Form::input('hidden','masalah[id]', $masalah->id)}}
    <?php } ?>
<?php } ?>


<div class="form-group has-primary">
    {{ Form::label('masalah[gka]', 'Gambaran Kasus Menurut Anak',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $msl['gka'] = (isset($masalah->gka)) ? $masalah->gka : null; ?>
        {{ Form::textarea('masalah[gka]', $msl['gka'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>


<div class="form-group has-primary">
    {{ Form::label('masalah[ha]', 'Harapan Anak',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $msl['ha'] = (isset($masalah->ha)) ? $masalah->ha : null; ?>
        {{ Form::textarea('masalah[ha]', $msl['ha'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('masalah[gkk]', 'Gambaran Kasus Menurut Keluarga',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $msl['gkk'] = (isset($masalah->gkk)) ? $masalah->gkk : null; ?>
        {{ Form::textarea('masalah[gkk]', $msl['gkk'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('masalah[hk]', 'Harapan Keluarga, Teman, dan Masyarakat',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $msl['hk'] = (isset($masalah->hk)) ? $masalah->hk : null; ?>
        {{ Form::textarea('masalah[hk]', $msl['hk'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>

<div class="form-group has-primary">
    {{ Form::label('masalah[kesimpulan]', 'Kesimpulan Kasus yang Terjadi',['class'=>'col-sm-5 control-label']) }}
    <div class="col-sm-7">
        <?php $msl['kesimpulan'] = (isset($masalah->kesimpulan)) ? $masalah->kesimpulan : null; ?>
        {{ Form::textarea('masalah[kesimpulan]', $msl['kesimpulan'], ['class' => 'form-control ckeditor','rows'=>'3'])  }}
    </div>
</div>
