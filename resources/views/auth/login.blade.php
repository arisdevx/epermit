@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br><img class="img img-responsive center-block" src="{{ asset('img/taip-jpsm-logo.png') }}" width="150"><br>
        </div>

        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-body">
                    @if(session()->has('active-status'))
                        @if(session()->get('active-status') == 'success')
                            <div class="alert alert-success text-center">Your account has been active</div>
                        @else
                            <div class="alert alert-danger text-center">Failed activate account</div>
                        @endif
                    @endif
                    <form class="form-horizontal" role="form" id="form" method="POST" action="{{ url('auth/login') }}">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="material-icons">email</i></span>
                                    <input id="email" type="text" class="form-control" name="username" placeholder="Kata Nama / Username" value="{{ old('ic') }}" autofocus required style="text-transform: none !important;">
                                    <span class="material-icons form-control-feedback">clear</span>
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="material-icons">lock</i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Kata Laluan" name="password" required style="text-transform: none !important;">
                                    <span class="material-icons form-control-feedback">clear</span>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="btn-group-justified">
                                    <button type="submit" class="btn btn-teal" style="width: 100%">
                                        Log Masuk
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox">
                            <label class="pull-right">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingatkan Saya
                            </label>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="col-md-12">
                                <span class="pull-left">Belum <a href="{{ url('account/register') }}">Mendaftar</a>?<br /><small><i>Not <a href="{{ url('account/register') }}">Registered</a> Yet?</i></small></span>
                                <span class="pull-right">Lupa <a href="{{ url('account/forgot-password') }}">Kata Laluan</a>! <br /><small><i>Forget <a href="{{ url('account/forgot-password') }}">Password</a>!</i></small></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('status'))
    @if(session()->get('status') == 'auth-false')
        <div class="modal fade" id="loginFailed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Log Masuk Gagal</h4>
            </div>
            <div class="modal-body">
                Kata Nama atau Kata Laluan yang dimasukkan salah. Sila cuba lagi
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
        </div>
    @endif
@endif
@endsection
