@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentMethodType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-method-type.update", [$paymentMethodType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="name">{{ trans('cruds.paymentMethodType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $paymentMethodType->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethodType.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <div class="form-check {{ $errors->has('account_name_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="account_name_select" value="0">
                    <input class="form-check-input" type="checkbox" name="account_name_select" id="account_name_select" value="1" {{ $paymentMethodType->account_name_select || old('account_name_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="account_name_select">{{ trans('cruds.paymentMethod.fields.account_name_select') }}</label>
                </div>
                @if($errors->has('account_name_select'))
                    <span class="text-danger">{{ $errors->first('account_name_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_name_select_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('account_num_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="account_num_select" value="0">
                    <input class="form-check-input" type="checkbox" name="account_num_select" id="account_num_select" value="1" {{ $paymentMethodType->account_num_select || old('account_num_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="account_num_select">{{ trans('cruds.paymentMethod.fields.account_num_select') }}</label>
                </div>
                @if($errors->has('account_num_select'))
                    <span class="text-danger">{{ $errors->first('account_num_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.account_num_select_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('routing_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="routing_select" value="0">
                    <input class="form-check-input" type="checkbox" name="routing_select" id="routing_select" value="1" {{ $paymentMethodType->routing_select || old('routing_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="routing_select">{{ trans('cruds.paymentMethod.fields.routing_select') }}</label>
                </div>
                @if($errors->has('routing_select'))
                    <span class="text-danger">{{ $errors->first('routing_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.routing_select_helper') }}</span>
            </div>
            <div class="form-group" id="swift_select_div">
                <div class="form-check {{ $errors->has('swift_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="swift_select" value="0">
                    <input class="form-check-input" type="checkbox" name="swift_select" id="swift_select" value="1" {{ $paymentMethodType->swift_select || old('swift_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="swift_select">{{ trans('cruds.paymentMethod.fields.swift_select') }}</label>
                </div>
                @if($errors->has('swift_select'))
                    <span class="text-danger">{{ $errors->first('swift_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.swift_select_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('notes_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="notes_select" value="0">
                    <input class="form-check-input" type="checkbox" name="notes_select" id="notes_select" value="1" {{ $paymentMethodType->notes_select || old('notes_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="notes_select">{{ trans('cruds.paymentMethod.fields.notes_select') }}</label>
                </div>
                @if($errors->has('notes_select'))
                    <span class="text-danger">{{ $errors->first('notes_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.notes_select_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('paypal_email_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="paypal_email_select" value="0">
                    <input class="form-check-input" type="checkbox" name="paypal_email_select" id="paypal_email_select" value="1" {{ $paymentMethodType->paypal_email_select || old('paypal_email_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="paypal_email_select">{{ trans('cruds.paymentMethod.fields.paypal_email_select') }}</label>
                </div>
                @if($errors->has('paypal_email_select'))
                    <span class="text-danger">{{ $errors->first('paypal_email_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.paypal_email_select_helper') }}</span>
            </div>
           
            <div class="form-group" id="custom_email_select_div">
                <div class="form-check {{ $errors->has('custom_email_select') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="custom_email_select" value="0">
                    <input class="form-check-input" type="checkbox" name="custom_email_select" id="custom_email_select" value="1" {{ $paymentMethodType->custom_email_select || old('custom_email_select', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="custom_email_select">{{ trans('cruds.paymentMethod.fields.custom_email_select') }}</label>
                </div>
                @if($errors->has('custom_email_select'))
                    <span class="text-danger">{{ $errors->first('custom_email_select') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.custom_email_select_helper') }}</span>
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