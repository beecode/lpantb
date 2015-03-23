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
      <li><a href="#"><i class="fa fa-th-list"></i> KA5</a></li>
      <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
    </ol>
  </section>
  <!-- Main content -->

  <section class="content invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12" style="margin-bottom:3px;">
        <img src="{{ asset('images/kop.png');}}" alt="" width="100%"/>
        <!-- <hr style="margin:1px; border-bottom: 3px solid #000;"> -->
        <!-- <hr style="margin:1px; border-bottom: 1px solid #000;"> -->
      </div>
    </div>

    <div class="row">
      <div class="col-xs-11 col-offset-1" style="text-align:center; padding-left:50px;">
        <span class="" style="margin-bottom:10px;">
          <h4 style="margin:0px;">
            <strong>RENCANA INTERVENSI KASUS ANAK</strong>
          </h4>
        </span>
      </div>
      <div class="col-xs-1">
        <span class="pull-right small" style="margin-bottom:10px;">
          <label class="label label-danger"  style="margin:0px;">Form KA5</label>
        </span>
      </div>
    </div><!-- /.col -->

    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-xs-12">
        <span class="pull-left">
          <h6 style="margin:1px; padding:1px;">
            No. LKA {{$data->no_lka}}
          </h6>
        </span>
        <span class="pull-right">
          <h6 style="margin:1px; padding:1px;">
            {{date('l, d F Y',strtotime($data->tanggal))}}
          </h6>
        </span>
        <span class="clearfix"></span>
        <br>
      </div>

      @include('formka5.detail.anak')
      @include('formka5.detail.uraian')
      @include('formka5.detail.intervensi')
      @include('formka5.detail.disposisi')
      @include('formka5.detail.sign')


    </div><!-- /.row -->

    <div class="row no-print">
      <div class="col-xs-12" style="margin-top:61px;">
        <a href="{{URL::to('lpantb/formka5')}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
        <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
      </div>
    </div>

  </section>
</aside>
@stop
