@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.balance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.balances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="company_name_id">{{ trans('cruds.balance.fields.company_name') }}</label>
                <select class="form-control select2 {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name_id" id="company_name_id">
                    @foreach($company_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('company_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_name'))
                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revenue">{{ trans('cruds.balance.fields.revenue') }}</label>
                <input class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}" type="number" name="revenue" id="revenue" value="{{ old('revenue', '0.00') }}" step="0.01">
                @if($errors->has('revenue'))
                    <span class="text-danger">{{ $errors->first('revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout">{{ trans('cruds.balance.fields.payout') }}</label>
                <input class="form-control {{ $errors->has('payout') ? 'is-invalid' : '' }}" type="number" name="payout" id="payout" value="{{ old('payout', '0.00') }}" step="0.01">
                @if($errors->has('payout'))
                    <span class="text-danger">{{ $errors->first('payout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.payout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profit">{{ trans('cruds.balance.fields.profit') }}</label>
                <input class="form-control {{ $errors->has('profit') ? 'is-invalid' : '' }}" type="number" name="profit" id="profit" value="{{ old('profit', '0.00') }}" step="0.01">
                @if($errors->has('profit'))
                    <span class="text-danger">{{ $errors->first('profit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.profit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_status_id">{{ trans('cruds.balance.fields.payment_status') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status_id" id="payment_status_id">
                    @foreach($payment_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('payment_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <span class="text-danger">{{ $errors->first('payment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_id">{{ trans('cruds.balance.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id">
                    @foreach($payment_methods as $id => $entry)
                        <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="publisher_notes">{{ trans('cruds.balance.fields.publisher_notes') }}</label>
                <textarea class="form-control {{ $errors->has('publisher_notes') ? 'is-invalid' : '' }}" name="publisher_notes" id="publisher_notes">{{ old('publisher_notes') }}</textarea>
                @if($errors->has('publisher_notes'))
                    <span class="text-danger">{{ $errors->first('publisher_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.publisher_notes_helper') }}</span>
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