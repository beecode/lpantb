<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">Kode</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Jenis Kasus</th>
                    <th>Form</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php foreach ($table as $val) { ?>
                    <?php
                    ?>
                    <tr>
                        <td class="text-center">{{$val->id}}</td>
                        <td>{{$val->nama}}</td>
                        <td>{{$val->gender}}</td>
                        <td>
                            <?php
                            foreach ($val->jenis_kasus as $jenis) {
                                echo $jenis->jenis . "<br/>";
                            }
                            ?>
                        </td>
                        <td>
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <?php $c = count($val->form); ?>
                                <?php $i = 1; ?>
                                <?php foreach ($val->form as $form) { ?>
                                    <a class="btn btn-small btn-warning "
                                       href="{{ URL::to('/lpantb/form'.$form->nama.'/detailview/'.$form->id) }}">
                                           <?php echo $form->nama ?>
                                    </a>
                                    <?php $i++ ?>
                                <?php } ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-info" title="Detail" 
                                   href="{{ URL::to('/lpantb/anak/detailview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-th-list"></span> 
                                </a>
                                <a class="btn btn-small btn-info" title="File" 
                                   href="{{ URL::to('/lpantb/anak/files/view/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-file"></span> 
                                </a>
                                <a class="btn btn-small btn-warning" title="Update" 
                                   href="{{ URL::to('/lpantb/anak/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span> 
                                </a>
                                <button class="btn btn-small btn-danger" title="Delete" 
                                        data-toggle="modal" data-target="#anakpop{{$val->id}}">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </button>
                            </div>
                            @include('anak.view.modal')
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <br/>
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