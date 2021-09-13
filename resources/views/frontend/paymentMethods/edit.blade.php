@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.paymentMethod.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.payment-methods.update", [$paymentMethod->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('cruds.paymentMethod.fields.name') }}</label>
                            <select class="form-control" name="name" id="name">
                                <option value disabled {{ old('name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\PaymentMethod::NAME_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('name', $paymentMethod->name) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="account_name">{{ trans('cruds.paymentMethod.fields.account_name') }}</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="{{ old('account_name', $paymentMethod->account_name) }}">
                            @if($errors->has('account_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="account_number">{{ trans('cruds.paymentMethod.fields.account_number') }}</label>
                            <input class="form-control" type="text" name="account_number" id="account_number" value="{{ old('account_number', $paymentMethod->account_number) }}">
                            @if($errors->has('account_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="routing_number">{{ trans('cruds.paymentMethod.fields.routing_number') }}</label>
                            <input class="form-control" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', $paymentMethod->routing_number) }}">
                            @if($errors->has('routing_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('routing_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift">{{ trans('cruds.paymentMethod.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', $paymentMethod->swift) }}">
                            @if($errors->has('swift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paypal_email">{{ trans('cruds.paymentMethod.fields.paypal_email') }}</label>
                            <input class="form-control" type="email" name="paypal_email" id="paypal_email" value="{{ old('paypal_email', $paymentMethod->paypal_email) }}">
                            @if($errors->has('paypal_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paypal_email') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection