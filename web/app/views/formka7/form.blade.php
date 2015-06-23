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
                    <a href="{{URL::to('dash/formka7')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form id="myWizard" method="POST" action="{{$form_url}}" class="form-horizontal">
                    <div class="row">
                        <section class="step" data-step-title="No LKA">
                            @include('formka7.step.lka')
                        </section>
                        <section class="step" data-step-title="Anak">
                            @include('formka7.step.anak')
                        </section>
                        <section class="step" data-step-title="Proses dan Hasil">
                            @include('formka7.step.proses')
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>
@stop
