@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.paymentMethod.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-methods.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.paymentMethod.fields.name') }}</label>
                <select class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name">
                    <option value disabled {{ old('name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PaymentMethod::NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('name', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_name">{{ trans('cruds.paymentMethod.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}">
                @if($errors->has('account_name'))
                    <span class="text-danger">{{ $errors->first('account_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_number">{{ trans('cruds.paymentMethod.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}">
                @if($errors->has('account_number'))
                    <span class="text-danger">{{ $errors->first('account_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="routing_number">{{ trans('cruds.paymentMethod.fields.routing_number') }}</label>
                <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', '') }}">
                @if($errors->has('routing_number'))
                    <span class="text-danger">{{ $errors->first('routing_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="swift">{{ trans('cruds.paymentMethod.fields.swift') }}</label>
                <input class="form-control {{ $errors->has('swift') ? 'is-invalid' : '' }}" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                @if($errors->has('swift'))
                    <span class="text-danger">{{ $errors->first('swift') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paypal_email">{{ trans('cruds.paymentMethod.fields.paypal_email') }}</label>
                <input class="form-control {{ $errors->has('paypal_email') ? 'is-invalid' : '' }}" type="email" name="paypal_email" id="paypal_email" value="{{ old('paypal_email') }}">
                @if($errors->has('paypal_email'))
                    <span class="text-danger">{{ $errors->first('paypal_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection