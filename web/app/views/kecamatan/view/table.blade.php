<style>
.cell-right{
text-align: right;
}

.cell-left{
text-align: left;
}

.cell-center{
text-align: center;
}
</style>

<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">Kode</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="small">
                <?php foreach ($table as $val) { ?>
                    <tr>
                        <td class="text-center">{{$val->id}}</td>
                        <td>{{$val->nama}}</td>
                        <td>{{$val->kabkota->nama}}</td>
                        <td>{{$val->kabkota->provinsi->nama}}</td>
                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-success" title="Update"
                                   href="{{ URL::to('/dash/setting/desa/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span> </a>
                                <a class="btn btn-small btn-danger" title="Delete"
                                   href="{{ URL::to('/dash/setting/desa/delete/'.$val->id) }}">
                                    <span class="glyphicon glyphicon-trash"></span> </a>
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


<!--
<script type="text/javascript">
    $(".table").dataTable({
        "processing": true,
        // "serverSide": true,
        "deferRender": true,
        "ajax": '<?php echo URL::to('dash/setting/kecamatan/ajax'); ?>',

        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        // "bSort": true,
        "bAutoWidth": false,
        "order":[[0,'asc']],
        "aaSorting":[[0,'asc']],
        "ordering": true,
        "aoColumns": [
                        {"sClass": "cell-center"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-left"},
                        {"sClass": "cell-center"},
                      ]

    });
</script> -->
