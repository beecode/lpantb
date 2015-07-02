@extends('login.layout')
@section('content')
<div class="form-box" id="login-box">
    <div class="header">Sign In</div>
    <form method="post" action="{{URL::to('login/doLogin')}}">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username"/>
                {{ $errors->first('username') }}
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                {{ $errors->first('password') }}
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me"/> Ingat Saya
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">Masuk Ke Dalam Aplikasi</button>
        </div>
    </form>
</div>

@if (Session::has('message'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ Session::get('message') }}
</div>
@endif

@stop
