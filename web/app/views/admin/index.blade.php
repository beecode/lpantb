@extends('layout.lteadmin.index')

@section('content')
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Welcome to Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-home"></i>
                    <h3 class="box-title">WELCOME</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <blockquote>
                        <p>Welcome to the Institute of Child Protection Information System Lombok (Mataram).</p>
                        <small> <cite title="Source Title">Source by LiveCode</cite></small>
                    </blockquote>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </section>
</aside>
</div>
@stop
