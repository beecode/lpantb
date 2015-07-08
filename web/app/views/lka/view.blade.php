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


        <form class="form-horizontal" action="{{URL::to('/dash/setting/lka/update')}}" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2">Setting Nomer LKA</label>
            <div class="col-sm-10">
              <div class="pull-left">
                <input type="text" class="form-control" ng-model="vm.part"
                       value="{{SettingDAO::getValue('LKA_PART')}}" name="lka_part">
              </div>



              <span class="pull-left">
                <button class="btn btn-primary">Simpan</button>
              </span>
            </div>
          </div>

          <?php
          $last = SettingDAO::getValue("LKA_LAST_NUMBER");
          $number =  str_pad($last, 3, "0", STR_PAD_LEFT);
          ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Contoh Hasil Nomer LKA</label>
            <div class="col-sm-4">
              <span class="form-control">{{$number}}/<% vm.part %>/{{RomanHelper::numberToRoman(date('m'))}}/{{date('Y')}}</span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</aside>

<script type="text/javascript">
app.controller('LKACtrl',LKACtrl);
LKACtrl.$inject = [];

function LKACtrl(){
  var vm = this;
  vm.part = '<?php echo SettingDAO::getValue('LKA_PART'); ?>';

}

</script>
@stop
