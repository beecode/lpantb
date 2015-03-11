@extends('layout.lteadmin.index')
@section('content')
<aside class="right-side">
    <section class="content-header">
        <h1>
            {{$page_title}}
            <small>{{$panel_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Kasus Anak</a></li>
            <li><a href="#"><i class="fa fa-th-list"></i> KA4</a></li>
            <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <span class="fa fa-edit"></span>
                    Laporan Kasus Anak
                    <span class="pull-right small"><label class="label label-danger">Form KA4</label></span>
                </h2>

            </div>

        </div><!-- /.col -->

        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-xs-12" style="padding-bottom: 10px;">
                <span class="pull-left">
                    <label>No. LKA {{$data->no_lka}}</label> 
                </span>
                <span class="pull-right">
                    <label>Tanggal  {{date('d-m-Y',strtotime($data->tanggal))}}</label> 
                </span>
                <span class="clearfix"></span>
            </div>

            @include('formka4.detail.anak')
            @include('formka4.detail.gambaran')
            @include('formka4.detail.keluarga')
            @include('formka4.detail.identifikasi')
            @include('formka4.detail.psikososial')
            @include('formka4.detail.rekomendasi')

        </div><!-- /.row -->

        <div class="row no-print">
            <div class="col-xs-12" style="margin-top:61px;">
                <a href="{{URL::to('lpantb/formka3')}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
                <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
        </div>

    </section>
</aside>
@stop
