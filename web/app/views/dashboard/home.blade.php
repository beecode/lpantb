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
        @include('dashboard.chart.jenis')
        @include('dashboard.chart.lokasi')
        @include('dashboard.chart.pendidikan')
        @include('dashboard.chart.usia')
    </section>
</aside>
@stop
