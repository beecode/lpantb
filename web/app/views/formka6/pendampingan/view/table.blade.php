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
                    <!-- <th class="text-center">No</th> -->
                    <th>Hari/Tanggal</th>
                    <th>Bentuk Pendampingan</th>
                    <th>Tempat</th>
                    <th>Pelaksana</th>
                    <th>Hasil Yang Dicapai</th>
                    <th>Rencana Tindak Lanjut</th>
                    <th>Keterangan</th>
                    <th class="text-center" style="width:130px;">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php $c = 1; ?>
                <?php foreach ($table as $val) { ?>
                    <tr>
                        <!-- <td class="text-center">{{$c++}}</td> -->
                        <td>{{strftime( "%A, %d-%B-%Y", strtotime($val->tanggal))}}</td>
                        <td>{{$val->bentuk}}</td>
                        <td>{{$val->tempat}}</td>
                        <td>
                          <?php
                          $pel = json_decode($val->pelaksana);
                          $c = count($pel);
                          $i=0;
                          foreach($pel as $p){
                            if ($i==$c-1){
                              echo $p->text;
                            } else {
                              echo $p->text.", ";
                            }
                            $i++;
                          }
                          ?>
                        </td>
                        <td>{{$val->hasil}}</td>
                        <td>{{$val->rencana}}</td>
                        <td>{{$val->keterangan}}</td>

                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                               <a class="btn btn-small btn-info" title="Detail"
                                   href="{{ URL::to('/lpantb/formka6/pendampingan/detailview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-th-list"></span>
                                </a>
                                <a class="btn btn-small btn-warning" title="Update"
                                   href="{{ URL::to('/lpantb/formka6/pendampingan/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span>
                                </a>
                                <a class="btn btn-small btn-danger" title="Delete"
                                   href="{{ URL::to('/lpantb/formka6/pendampingan/delete/'.$val->id) }}">
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
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        // "bSort": true,
        "bAutoWidth": true,
        "order":[[0,'asc']],
        "aaSorting":[[0,'asc']],
        "ordering": true,
    });
</script>
