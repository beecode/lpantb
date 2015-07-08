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
                    <a href="{{URL::to('dash/formka1')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body" ng-controller="PreAddController as vm">

                <form method="POST" action="{{$form_url}}" class="form-horizontal">
                  <!-- <div class="row"> -->
                      <!-- <section class="step" data-step-title="No LKA"> -->
                        <div class="form-group has-primary">
                            <label for="anak[ke]" class="col-sm-3 control-label">Sistem Penomoran LKA</label>
                            <div class="col-sm-3" >
                              <div class="btn-group">
                                <a href="javascript:void(0)" class="btn"
                                  ng-click="vm.autoMode()"
                                  ng-class="{ 'btn-default': !vm.isAuto,'active btn-primary' : vm.isAuto }">
                                    System
                                </a>
                                <a href="javascript:void(0)" class="btn"
                                   ng-click="vm.manualMode()"
                                   ng-class="{ 'btn-default':vm.isAuto,'active btn-danger' : !vm.isAuto }">
                                   Manual
                                </a>
                              </div>
                              <input type="hidden" name="penomoran[mode]" value="<% vm.modeValue %>">
                            </div>
                        </div>

                        <span ng-hide="vm.isAuto">
                        <div class="form-group"
                             ng-class="{ 'has-primary':vm.uniqueLKA, 'has-error':!vm.uniqueLKA }">
                            <label class="control-label col-sm-3">Manual LKA</label>
                            <div class="col-sm-3">
                              <input name="penomoran[lka]" type="text"
                                     class="form-control col-sm-3" placeholder="Nomor LKA Manual"
                                     ng-model="vm.textlka" ng-change="vm.LKAOnChange()"
                                     ng-required="!vm.isAuto" ng-disabled="vm.isAuto">
                            </div>
                        </div>
                        <div class="form-group"
                             ng-class="{ 'has-primary':vm.uniqueLKA, 'has-error':!vm.uniqueLKA }"
                             ng-hide="vm.uniqueLKA">
                             <label class="control-label col-sm-3"></label>
                             <div class="col-sm-6">
                              <p class="help-block" ng-hide="vm.uniqueLKA" style="text-align: justify">
                               Error, Nomer LKA yang anda inputkan sudah ada di dalam database,
                               System tidak menerima Nomer LKA yang kembar. <br/>
                               Silahkan lakukan pencarian
                               pada halaman View dengan nomer LKA yang telah anda inputkan,
                               jika Anda bermaksud untuk mengubah Form dengan nomer LKA tersebut.
                             </p>
                           </div>
                         </div>
                        </span>

                        <div class="form-group has-primary">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-3">
                              <button class="btn btn-primary" ng-disabled="!vm.canIPass()">
                                Lanjutkan
                                <span class="glyphicon glyphicon-chevron-right"></span>
                              </button>
                            </div>
                          </div>
                      <!-- </section> -->
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </section>
</aside>

<script type="text/javascript">
app.controller('PreAddController',PreAddController);
PreAddController.$inject = ['$scope', '$http'];

function PreAddController($scope, $http){
  console.log('PreAddController is Initialized');
  var vm = this;
  vm.isAuto = true;
  vm.mode= 'auto';
  vm.modeValue='auto';

  vm.uniqueLKA = true;
  vm.autoMode = autoMode;
  vm.manualMode = manualMode;
  vm.LKAOnChange = LKAOnChange;
  vm.tanggalOnChange = tanggalOnChange;
  vm.canIPass = canIPass;
  vm.lanjutkan = true;
  vm.readylka = false;


  function autoMode(){
    vm.isAuto = true;
    vm.modeValue = "auto";
    vm.lanjutkan = true;
  }

  function manualMode(){
    vm.isAuto = false;
    vm.modeValue = "manual";
    vm.lanjutkan = false;
  }

  function LKAOnChange(value){
    var url = 'http://<?php echo Request::server ("SERVER_NAME"); ?>/dash/service/islkaunique?query='+vm.textlka;
    $http.get(url)
    .success(function(data, status, header, config){
      console.log('is lka unique= ',data.status);
      vm.uniqueLKA = data.status;
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
    if (vm.uniqueLKA==true){
        vm.readylka = true;
    } else {
        vm.readylka  = false;
    }
    // console.log(vm.statuslka);
  }

  function tanggalOnChange(){
    if (vm.tanggal!=undefined){
      vm.readytanggal = true;
    } else {
      vm.readytanggal  = false;
    }
  }

  function canIPass(){
    if (vm.isAuto == true){
      return true;
    } else {
      if (vm.uniqueLKA==true){
        return true;
      } else {
        return false;
      }
    }

  }

}
</script>
@stop
