<?php if (!is_null($table->first())) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
                <tr class="small">
                    <!-- <th class="text-center">Kode</th> -->
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Username</th>
                    <!-- <th>Password</th> -->
                    <th>Level</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php foreach ($table as $val) { ?>
                  <?php if ($val->id != Auth::user()->id){ ?>
                    <tr>
                        <!-- <td class="text-center">{{$val->id}}</td> -->
                        <td>{{$val->name}}</td>
                        <td>{{$val->occupation}}</td>
                        <td>{{$val->email}}</td>
                        <td>{{$val->username}}</td>
                        <!-- <td>{{$val->password}}</td> -->
                        <td>
                          <?php
                          if ($val->level == "developer"){
                            echo "Developer";
                          } else if ($val->level == "admin"){
                            echo "Administrator";
                          } else {
                            echo "Operator";
                          }
                          ?>
                        </td>

                        <td class="text-center">
                            <?php if ($val->level != "admin" && $val->level != "developer"){ ?>
                            <div class="btn btn-group btn-group-sm" style="margin: 0px; padding: 0px;">
                                <a class="btn btn-small btn-warning" title="Update"
                                   href="{{ URL::to('/dash/user/updateview/'.$val->id) }}">
                                    <span class=" glyphicon glyphicon-edit"></span>
                                </a>
                                <a class="btn btn-small btn-danger" title="Delete"
                                    data-toggle="modal" data-target="#delmodal-{{$val->id}}">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                              </div>
                              @include('user.view.delwarning')
                            </div>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
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
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        // "bSort": true,
        "bAutoWidth": false,
        "order":[[4,'asc'],[0, 'asc']],
        "aaSorting":[[4,'asc'],[0, 'asc']],
        "ordering": true,
    });
</script>
