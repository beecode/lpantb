@extends('layout.ltefront.index')
@section('content')

<aside class="right-side strecth strech">
    <section class="content-header">
        <h1>
            {{$page_title}}
            <small>{{$panel_title}}</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('front.chart.usia')
        @include('front.chart.pendidikan')
        @include('front.chart.lokasi')
        @include('front.chart.jenis')
    </section>
</aside>
@stop
