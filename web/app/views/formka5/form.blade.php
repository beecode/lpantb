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
                    <a href="{{URL::to('lpantb/formka5')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form id="myWizard" method="POST" action="{{$form_url}}" class="form-horizontal">
                    <div class="row">
                        <section class="step" data-step-title="No LKA">
                            @include('formka5.step.lka')
                        </section>
                        <section class="step" data-step-title="Anak">
                            @include('formka5.step.anak')
                        </section>
                        <section class="step" data-step-title="Uraian & Intervensi">
                            @include('formka5.step.uraian')
                        </section>
                        <section class="step" data-step-title="Intervensi">
                            @include('formka5.step.intervensi')
                        </section>
                        <section class="step" data-step-title="Disposisi">
                            @include('formka5.step.disposisi')
                        </section>
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
