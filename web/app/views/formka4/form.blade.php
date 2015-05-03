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
                    <a href="{{URL::to('lpantb/formka4')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body" >
                <form id="myWizard" method="POST" action="{{$form_url}}" class="form-horizontal">
                    <div class="row">
                        <section class="step" data-step-title="No LKA">
                            @include('formka4.step.lka')
                        </section>
                        <section class="step" data-step-title="Anak">
                            @include('formka4.step.anak')
                        </section>
                        <section class="step" data-step-title="Fisik">
                            @include('formka4.step.gambaran')
                        </section>
                        <section class="step" data-step-title="Keluarga">
                            @include('formka4.step.bapak')
                            @include('formka4.step.ibu')
                            @include('formka4.step.keluarga')
                        </section>
                        <section class="step" data-step-title="Masalah">
                            @include('formka4.step.identifikasi')
                        </section>
                        <section class="step" data-step-title="Psikososial">
                            @include('formka4.step.psikososial')
                        </section>
                        <section class="step" data-step-title="Rekomendasi">
                            @include('formka4.step.rekomendasi')
                        </section>
                        <section class="step" data-step-title="Tanda Tangan">
                            @include('formka4.step.sign')
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>


@stop
