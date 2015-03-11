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
                    <a href="{{URL::to('lpantb/formka1')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>   
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{$form_url}}">
                <div class="" ng-app="app">
                    <div ng-controller="CheckCtrl">
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::label('nama','Nama Anak',['class'=>'control-label col-sm-2  '])}}
                                <div class="col-sm-5">
                                    <div class="typeahead-basic">
                                        {{Form::text('fandi','',['class'=>'form-control typeahead','ng-model'=>'anakNama'])}}
                                    </div>
                                </div>
                                <a class="btn btn-primary checkbtn" ng-click="loadData()">
                                    <span class="glyphicon glyphicon-search"></span>
                                    Check
                                </a>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-6" ng-show="loadData.anak">
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Nama</th>
                                            <td><% loadData.anak.nama %></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><% loadData.anak.gender %></td>
                                        </tr>
                                        <tr>
                                            <th>Umur</th>
                                            <td><% loadData.anak.umur %> <% loadData.anak.umur_satuan %></td>
                                        </tr>
                                        <tr>
                                            <th>Agama</th>
                                            <td><% loadData.anak.agama %></td>
                                        </tr>
                                    </table>
                                    <div class="pull-right">
                                        <a href="{{URL::to('lpantb/formka7/addview/')}}/<%loadData.anak.id%>"
                                           class="btn btn-primary">
                                            Next
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="" ng-show="loadData.failed">
                                    <div class="alert alert-danger">
                                        Data is empty, there no name like that
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script type="text/javascript">
                    var app = angular.module("app", ['ngTouch', 'angucomplete'], function($interpolateProvider) {
                        $interpolateProvider.startSymbol('<%');
                        $interpolateProvider.endSymbol('%>');
                    });

                    app.controller('CheckCtrl', ['$scope', '$http', function($scope, $http) {
                            $scope.user = {};
                            $scope.results = [];


                            $scope.loadData = function() {
                                var promise = $http.get('<?php echo URL::to('lpantb/service/anak/nama/') ?>/' + $scope.anakNama);

                                promise.success(function(data, status, headers, config) {
                                    $scope.loadData.anak = data[0];
                                    if (data[0] != null) {
                                        $scope.loadData.failed = false;
                                    } else {
                                        $scope.loadData.failed = true;
                                    }

                                });
                                promise.error(function(data, status, headers, config) {
                                    $scope.loadData.failed = false;
                                });
                            };
                        }
                    ]);

                </script>
            </form>
        </div>
    </section>
</aside>


<script type="text/javascript">
    var anak = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '<?php echo URL::to('lpantb/service/anak/list') ?>'
    });

    anak.initialize();

    $('.typeahead-basic .typeahead').typeahead({
        highlight: true
    },
    {
        name: 'anak',
        displayKey: 'nama',
        source: anak.ttAdapter(),
    });

    $('.checkbtn').on('click', function() {

    });
</script>
@stop