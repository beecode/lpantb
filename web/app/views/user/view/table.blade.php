<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <th class="text-center">Kode</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php foreach ($table as $val) { ?>
                    <tr>
                        <td class="text-center">{{$val->id}}</td>
                        <td>{{$val->display_name}}</td>
                        <td>{{$val->email}}</td>
                        <td>{{$val->username}}</td>
                        <td>{{$val->password}}</td>
                        <td>{{$val->level}}</td>
                        <td class="text-center">
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-warning" title="Update" 
                                   href="{{ URL::to('/lpantb/user/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span> 
                                </a>
                                <a class="btn btn-small btn-danger" title="Delete" 
                                   href="{{ URL::to('/lpantb/user/delete/'.$val->id) }}">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </a>
                            </div>
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