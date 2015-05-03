@extends('layout.lteadmin.index')
@section('content')
<aside class="right-side" >
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
  <section class="content" ng-app="app">
    @if (Session::has('message'))
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-info"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ Session::get('message') }}
    </div>
    @endif
    <div class="box box-primary" ng-controller="LKACtrl as vm">
      <div class="box-body">


        <form class="" action="" method="post">
          <div class="form-group">
            <label for="">Setting Nomer LKA</label>
            <input type="text" class="form-control" id="" ng-model="vm.part"
            value="{{SettingDAO::getValue('LKA_PART')}}">
          </div>

        </form>

        <?php
        $last = SettingDAO::getValue("LKA_LAST_NUMBER");
        $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
        ?>

        <div class="form-group">
          <label for="">Contoh Hasil Nomer LKA</label>
          <span class="form-control">{{$number}}.01/<% vm.part %>/{{RomanHelper::numberToRoman(date('m'))}}/{{date('Y')}}</span>
          <p class="help-block">Help text here.</p>
        </div>
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
  vm.part = '<?php echo SettingDAO::getValue('LKA_PART'); ?>';

}

</script>
@stop
