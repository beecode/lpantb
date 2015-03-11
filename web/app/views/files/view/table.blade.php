<?php

$jenis = $anak->jenis_kasus;
?>
<br/>
<div class="pull-left" style="margin-right: 16px;">
    <label class="label label-primary" style="font-size: 12px;"> No LKA</label>
    &nbsp
    <strong>{{$form->no_lka}}</strong>
</div>

<div class="pull-left" style="margin-right: 16px;">
    <label class="label label-primary" style="font-size: 12px;">Nama Anak</label>
    &nbsp
    <strong>{{$anak->nama}}</strong>
</div>

<div class="pull-left" style="margin-right: 16px;">
    <label class="label label-primary" style="font-size: 11px;"> Jenis Kasus</label>
    &nbsp
    <?php
    $c = count($jenis);
    $i = 1;
    ?>
    <?php foreach ($jenis as $vk) { ?>
        <?php if ($i <= $c-1) { ?>
            <strong>{{$vk->jenis.", "}}</strong>
        <?php } else { ?>
            <strong>{{$vk->jenis}}</strong>
        <?php } ?>
        <?php $i++; ?>
    <?php } ?>
</div>
<br/>
<br/>




<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>File Size</th>
                    <th>File Type</th>
                    <th>Download</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php $c = 1; ?>
                <?php foreach ($table as $val) { ?>
                    <tr>
                        <td class="text-center">{{$c++}}</td>
                        <td>{{$val->nama}}</td>
                        <td>{{$val->keterangan}}</td>
                        <td>{{round($val->file_size/1024)}} KB</td>
                        <td>{{$val->file_type}}</td>
                        <td>
                            <a  class="btn btn-primary" target="_blank"
                                href="{{URL::to('upload/'.$val->file_name)}}">
                                <span class="glyphicon glyphicon-download"></span>
                                &nbsp; {{$val->file_name}}
                            </a>
                        </td>

                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-warning" title="Update" 
                                   href="{{ URL::to('/lpantb/anak/files/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span> 
                                </a>
                                <a class="btn btn-small btn-danger" title="Delete" 
                                   href="{{ URL::to('/lpantb/anak/files/delete/'.$val->id) }}">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </a>
                            </div>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-info">
            Data tidak tersedia atau tidak ditemukan...
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    $(".table").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
</script>