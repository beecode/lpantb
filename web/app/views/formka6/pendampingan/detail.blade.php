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
      <li><a href="#"><i class="fa fa-th-list"></i> KA1</a></li>
      <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
    </ol>
  </section>
  <!-- Main content -->

  <section class="content invoice" style="overflow:hidden;">
    <!-- title row -->
    <div class="row" >
      <div class="col-xs-12">
        <img src="{{ asset('images/kop.png');}}" alt="" width="100%"/>

      </div>
    </div>
    <div class="row" style="margin-top:5px; margin-bottom:5px;">
      <div class="col-xs-11 col-offset-1" style="text-align:center; padding-left:50px;">
        <span class="">
          <h4 style="margin:0px;">
            <strong>LAPORAN PERKEMBANGAN PENDAMPINGAN ANAK</strong>
          </h4>
        </span>
      </div>
      <div class="col-xs-1">
        <span class="pull-right small" >
          <label class="label label-danger" style="font-size:12px;">Form KA6</label>
        </span>
      </div>
    </div><!-- /.col -->

    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-xs-12">
        @include('formka6.pendampingan.detail.info')
      </div>

      <div class="col-xs-12">
        @include('formka6.pendampingan.detail.data')
      </div><!-- /.row -->

      <div class="col-xs-12">
        @include('formka6.pendampingan.detail.sign')
      </div><!-- /.row -->

      <div class="row no-print">
        <div class="col-xs-12" style="margin-top:61px;">
          <a href="{{URL::to('dash/formka6/pendampingan/view/'.$anak->id)}}" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</a>
          <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>

    </section>
  </aside>
  @stop
