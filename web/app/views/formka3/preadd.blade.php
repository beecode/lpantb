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
  <section class="content">
    @if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-warning"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('message') }}
    </div>
    @endif
    <div class="box box-primary">
      <div class="box-header">
        <div class="box-tools pull-left">
          <a href="{{URL::to('dash/formka3')}}" class="btn btn-primary">
            <i class="glyphicon glyphicon-chevron-left"></i>
            Back To Table View
          </a>
        </div>
      </div>
      <div class="box-body">
        @include('formka3.preadd.searchform')
        @include('formka3.preadd.result')

      </div>
    </div>
  </section>
</aside>
@stop
