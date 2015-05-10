@extends('layout.lteadmin.index')
@section('content')
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<aside class="right-side">
    <section class="content-header">
        <h1>
            {{$page_title}}
            <small>{{$panel_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
            <li><a href="#"><i class="fa fa-location-arrow"></i> Lokasi</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i> Kecamatan</a></li>
            <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form role="form" class="form-horizontal" method="POST" action="{{$form_url}}">
                    <?php if ($form_status == "update") { ?>
                        <input type="hidden" name="id" value="{{$record->id}}">
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Provinsi</label>
                        <div class="col-sm-5">
                            <?php if ($form_status == "add") { ?>
                                <select name="provinsi" class="form-control provinsi">
                                    <?php foreach ($provinsi as $prov) { ?>
                                        <option value="<?php echo $prov->id ?>">
                                            <?php echo $prov->nama; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            <?php } else { ?>
                                <select name="provinsi" class="form-control provinsi">
                                    <?php foreach ($provinsi as $prov) { ?>

                                        <option value="<?php echo $prov->id ?>"
                                        <?php
                                        if ($record->kabkota->provinsi->nama == $prov->nama) {
                                            echo 'selected="selected"';
                                        }
                                        ?>>
                                                    <?php echo $prov->nama; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kabupaten / Kota</label>
                        <div class="col-sm-5">
                            <?php if ($form_status == "add") { ?>
                                <select name="kabkota" class="form-control kabkota">
                                    <!--ajax here-->
                                </select>
                            <?php } else { ?>
                                <select name="kabkota" class="form-control kabkota">
                                    <?php foreach ($kabkota as $kk) { ?>
                                        <option value="<?php echo $kk->id ?>"
                                                <?php if ($record->kabkota->nama == $kk->nama) echo 'selected="selected"'; ?>>
                                                    <?php echo $kk->nama; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $('.provinsi').on('change', function() {
                            $.ajax({
                                type: 'GET',
                                url: "<?php echo URL::to('dash/setting/kecamatan/getkabkota') ?>/" + this.value,
                                dataType: 'json',
                                success: function(data) {
                                    var html = [];
                                    for (var i = 0, len = data.length; i < len; i++) {
                                        html[html.length] = "<option value=";
                                        html[html.length] = data[i].id;
                                        html[html.length] = ">";
                                        html[html.length] = data[i].nama;
                                        html[html.length] = "</option>";
                                    }
                                    $('.kabkota').find('option').remove();
                                    $(".kabkota").append(html.join(''));
                                }
                            });
                        })
                    </script>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kecamatan</label>
                        <div class="col-sm-5">
                            <?php if ($form_status == "add") { ?>
                                <input type="text" class="form-control"
                                       name="kecamatan" placeholder="Nama Kecamatan"
                                       required="required">
                                   <?php } else { ?>
                                <input type="text" class="form-control"
                                       name="kecamatan" value="{{$record->nama}}"
                                       required="required">
                                   <?php } ?>
                        </div>


                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-info"
                               href="{{ URL::to('/dash/setting/kecamatan') }}">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-saved"></span>
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>
@stop
