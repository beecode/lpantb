

<?php if ($form_status == "edit") { ?>
    {{Form::input('hidden','files[id]', $data->id)}}
<?php } ?>

{{Form::input('hidden','anak[id]', $anak->id)}}



<div class="form-group">
    {{ Form::label('lka', 'Nama',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $fl['nama'] = (isset($data->nama)) ? $data->nama : null; ?>
        {{ Form::text('files[nama]', $fl['nama'], ['class' => 'form-control'])  }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('lka', 'Keterangan',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <?php $fl['keterangan'] = (isset($data->keterangan)) ? $data->keterangan : null; ?>
        {{ Form::text('files[keterangan]', $fl['keterangan'], ['class' => 'form-control'])  }}
    </div>
</div>
<?php if ($form_status == "add") { ?>
<div class="form-group">
    {{ Form::label('lka', 'Files',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-5">
        <!--<span class="btn btn-primary btn-file">-->
            {{ Form::file('document')  }}
        <!--</span>-->
    </div>
</div>
<?php } ?>
<!--
<script>
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
</script>-->