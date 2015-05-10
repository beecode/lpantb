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
    <section class="content" ng-app="app">
        @if (Session::has('message'))
        <div class="alert alert-info alert-dismissable">
            <i class="fa fa-warning"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="box box-primary" ng-controller="PendampinganCtrl as vm">
            <div class="box-header">
                <div class="box-tools pull-left">
                    <a class="btn btn-primary" style="color: white;"
                       href="{{URL::to('dash/formka6/pendampingan/view/'.$anak->id)}}">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form method="POST" action="{{$form_url}}" class="form-horizontal">
                    @include('formka6.pendampingan.step.sform')
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

app.controller('PendampinganCtrl',PendampinganCtrl);
PendampinganCtrl.$inject = [];

function PendampinganCtrl(){
  var vm = this;
  <?php if (isset($data->pelaksana)){?>
    vm.list = <?php echo $data->pelaksana ?>
  <?php } else { ?>
    vm.list = [{text:''}];
  <?php } ?>

  vm.add = add;
  vm.remove = remove;

  function add(){
    vm.list.push({text:''});
  }

  function remove(obj){
    //remove from table in view
    var index = vm.list.indexOf(obj);
    if (index > -1) vm.list.splice(index, 1);
  }


}

</script>
@stop
