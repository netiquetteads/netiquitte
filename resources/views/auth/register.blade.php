@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="javascript:void(0);">
                <img src="{{ url('images/cpa_marketing_netiquette_logo.png') }}" alt="NetiquetteAds Logo">
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ trans('global.register') }}</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                @if(request()->has('team'))
                    <input type="hidden" name="team" id="team" value="{{ request()->query('team') }}">
                @endif
                <div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.first_name') }}" value="{{ old('first_name', null) }}">
                        @if($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.last_name') }}" value="{{ old('last_name', null) }}">
                        @if($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection