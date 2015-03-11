@extends('layout.lteadmin.index')
@section('content')
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<aside class="right-side">
    <section class="content-header">
        <h1>{{$page_title}}<small>{{$panel_title}}</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
            <li><a href="#"><i class="fa fa-location-arrow"></i> Lokasi</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i> Kecamatan</a></li>
            <li><a href="#"><i class="fa fa-table"></i> {{$panel_title}}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div  class="box-body">
                @include('kecamatan.view.search')
                @include('kecamatan.view.button')
                @include('kecamatan.view.table')
            </div>
            <div class="box-footer">
                <div class="text-center" style="margin: 0px;">
                    <?php echo $table->appends(array_except(Input::query(), Paginator::getPageName()))->links() ?>
                </div>
            </div>
    </section>
</aside>
@stop
