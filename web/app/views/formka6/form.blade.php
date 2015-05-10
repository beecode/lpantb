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
        <div class="box box-primary" ng-app="app">
            <div class="box-header">
                <div class="box-tools pull-left">
                    <a class="btn btn-primary" style="color: white;"
                       href="{{URL::to('dash/formka6/preaddview')}}">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form method="POST" action="{{$form_url}}" class="form-horizontal">
                    @include('formka6.step.lka')
                    @include('formka6.step.anak')
                    <div class="form-group">
                        <div class="pull-right"  style="padding-right: 20px;">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</aside>
<script type="text/javascript">
  var app = angular.module("app", ['ngTouch', 'angucomplete'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
  });

  app.controller('LKACtrl',LKACtrl);
  LKACtrl.$inject = [];

  function LKACtrl(){
    var vm = this;
    vm.tanggalToggle = tanggalToggle;
    vm.tanggalIcon = "glyphicon-ok";
    vm.isTanggal = true;

    vm.LKAToggle = LKAToggle;
    vm.LKAIcon = "glyphicon-ok"
    vm.isLKA = true;


    function tanggalToggle(){
      vm.isTanggal = !vm.isTanggal;
      if (vm.isTanggal==true){
        vm.tanggalIcon = "glyphicon-ok";
      } else {
        vm.tanggalIcon = "glyphicon-remove";
      }
    }

    function LKAToggle(){
      vm.isLKA = !vm.isLKA;
      if (vm.isLKA==true){
        vm.LKAIcon = "glyphicon-ok"
      } else {
        vm.LKAIcon = "glyphicon-remove"
      }
    }
  }
</script>
@stop
