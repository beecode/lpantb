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
                    <a href="{{URL::to('dash/setting/staff')}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Table View
                    </a>
                </div>
            </div>
            <div class="box-body">

                <form  method="POST" action="{{$form_url}}" class="form-horizontal">
                    <?php if ($form_status == "edit") { ?>
                        {{Form::input('hidden','staff[id]',$staff->id)}}
                    <?php } ?>

                    <div class="form-group">
                        {{ Form::label('Nama', 'Nama',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-3">
                            <?php $nama = (isset($staff->nama)) ? $staff->nama : null; ?>
                            {{ Form::text('staff[nama]', $nama, ['class' => 'form-control','required'])  }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('Jabatan', 'Jabatan',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-3">
                            <?php $jabatan = (isset($staff->jabatan)) ? $staff->jabatan : null; ?>
                            {{ Form::text('staff[jabatan]', $jabatan, ['class' => 'form-control','required'])  }}
                        </div>
                    </div>

                    <div class="form-actions ">
                        <label class="col-sm-2 control-label"></label>
                        <button class="btn btn-primary" type="submit">
                            <?php if ($form_status == "edit") { ?>
                                <span class="glyphicon glyphicon-edit"></span>
                                Update
                            <?php } else { ?>
                                <span class="glyphicon glyphicon-save"></span>
                                Save
                            <?php } ?>
                        </button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>
@stop
