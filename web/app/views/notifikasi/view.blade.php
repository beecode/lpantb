@extends('layout.lteadmin.index')
@section('content')
<style>
  .notif-time {
    font-size:11px;
    padding-top:10px;
    padding-right:5px;
  }

  .notif-close {
    font-size:21px;
    /*margin-top:12px;
    padding-right:5px;*/
  }
  .left-notif-view{
    width:55px;
    /*height:89px;*/
    font-size:21px;
    text-align:center;
    padding:15px 0px;
    background:#00c0ef;
    color:rgba(255, 255, 255, 0.89);
    margin-right:5px;
  }
</style>

<aside class="right-side">
    <section class="content-header">
        <h1>
            {{$page_title}}
            <small>{{$panel_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> {{$page_title}}</a></li>
            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
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
        <div class="box box-primary" ng-controller="NotifikasiCtrl as vm">
            <div class="box-body">

              <!-- inner menu: contains the actual data -->
              <ul class="menu list-unstyled" style="height:377px; overflow:auto;">
                <!-- start message -->
                <li ng-repeat="notif in vm.notif track by $index"
                    ng-class="{'notif-new': notif.status=='new', 'notif-read': notif.status=='read'}">

                    <div class="pull-left left-notif-view">
                      <span><% (vm.notif.length - $index) %></span>
                      <span class="notif-close" ng-click="vm.delete($index)">
                        <span class="btn btn-warning   btn-xs btn-flat">
                          <i class="glyphicon glyphicon-remove"></i>
                        </span>
                      </span>
                    </div>

                    <a href="{{URL::to('dash/notifikasi/read/<% notif.id %>')}}">
                        <span style="padding-top:10px;">
                          <% notif.title %>
                        </span>
                        <small class="pull-right notif-time">
                          <span >
                            <i class="fa fa-clock-o"></i>
                            <span am-time-ago="notif.created_at"></span>
                          </span>
                        </small>
                        <p ng-bind-html="vm.showHTML(notif.desc)"></p>
                    </a>

                </li><!-- end message -->
              </ul>

            </div>
        </div>
    </section>
</aside>

<script type="text/javascript">
app.controller('NotifikasiCtrl',NotifikasiCtrl);
NotifikasiCtrl.$inject = ['$http','$interval','$sce'];

function NotifikasiCtrl($http, $interval,$sce){
  var vm = this;
  vm.getNotif = getNotif;
  vm.getNewNotifCount = getNewNotifCount;
  vm.showHTML = showHTML;
  vm.markAllRead = markAllRead;
  vm.delete = deleteNotif;

  vm.my_user_id = <?php echo Auth::user()->id; ?>;
  vm.countDown = 1;
  vm.notif=null;
  vm.intervalTime = 2000;
  vm.notifNum = 0;
  vm.notifNew = 0;

  activate();

  function getNotif(){
    var url = 'http://lpantb.dev/dash/notifserv/mynotif/'+vm.my_user_id;
    $http.get(url)
    .success(function(data, status, header, config){
      vm.notif = data;

    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function getNewNotifCount(){
    var url = 'http://lpantb.dev/dash/notifserv/mynotif/new/count/'+vm.my_user_id;
    $http.get(url)
    .success(function(data, status, header, config){
      vm.notifNew = data;
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function markAllRead() {
    var url = 'http://lpantb.dev/dash/notifserv/markread';
    $http.get(url)
    .success(function(data, status, header, config){
      console.log(data);
      activate();
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function showHTML($data){
    return $sce.trustAsHtml($data);
  }

  function deleteNotif(index){
    var notif = vm.notif[index];

    var url = 'http://lpantb.dev/dash/notifserv/delete/'+notif.id;
    $http.get(url)
    .success(function(data, status, header, config){
      console.log(data);
      activate();
    })
    .error(function(data, status, header, config){
      console.log('data '+data);
      console.log('status '+status);
      console.log('header '+header);
    });
  }

  function activate(){
    $interval(
      function(){
        getNotif();
        getNewNotifCount();
        console.log(vm.countDown++);
      },
      vm.intervalTime
    );
    getNotif();
    getNewNotifCount();
  }
}
</script>
@stop
