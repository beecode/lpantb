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
            <li><a href="#"><i class="fa fa-angle-double-right"></i> Provinsi</a></li>
            <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form role="form" class="form-horizontal" method="POST" action="{{$form_url}}">
                    <?php if ($form_status == "update") { ?>
                        <input type="hidden" name="id" value="{{$provinsi->id}}">
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Provinsi</label>
                        <div class="col-sm-5">
                            <?php if ($form_status == "add") { ?>
                                <input type="text" class="form-control" 
                                       name="provinsi" placeholder="Nama Provinsi"
                                       required="required">
                                   <?php } else { ?>
                                <input type="text" class="form-control" 
                                       name="provinsi" value="{{$provinsi->nama}}"
                                       required="required">
                                   <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-info"
                               href="{{ URL::to('/lpantb/provinsi') }}">
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