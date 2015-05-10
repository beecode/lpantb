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
                    <a href="{{URL::to('dash/anak')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form method="POST" action="{{$form_url}}" class="form-horizontal">
                    <br/>
                    @include('anak.step.anak')
                    <div class="row no-print">
                        <div class="col-xs-12" style="margin-top:61px;">
                            <a href="{{URL::to('dash/anak')}}" class="btn btn-primary">
                                <i class="fa fa-chevron-left"></i> Back</a>
                            <button class="btn btn-warning pull-right" type="submit">
                                <i class="fa fa-edit"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>
@stop
