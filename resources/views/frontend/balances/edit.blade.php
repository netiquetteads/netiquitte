@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.balance.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.balances.update", [$balance->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="revenue">{{ trans('cruds.balance.fields.revenue') }}</label>
                            <input class="form-control" type="number" name="revenue" id="revenue" value="{{ old('revenue', $balance->revenue) }}" step="0.01">
                            @if($errors->has('revenue'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('revenue') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.revenue_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payout">{{ trans('cruds.balance.fields.payout') }}</label>
                            <input class="form-control" type="number" name="payout" id="payout" value="{{ old('payout', $balance->payout) }}" step="0.01">
                            @if($errors->has('payout'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payout') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.payout_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="profit">{{ trans('cruds.balance.fields.profit') }}</label>
                            <input class="form-control" type="number" name="profit" id="profit" value="{{ old('profit', $balance->profit) }}" step="0.01">
                            @if($errors->has('profit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.profit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="publisher_notes">{{ trans('cruds.balance.fields.publisher_notes') }}</label>
                            <textarea class="form-control" name="publisher_notes" id="publisher_notes">{{ old('publisher_notes', $balance->publisher_notes) }}</textarea>
                            @if($errors->has('publisher_notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('publisher_notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.publisher_notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_method_id">{{ trans('cruds.balance.fields.payment_method') }}</label>
                            <select class="form-control select2" name="payment_method_id" id="payment_method_id">
                                @foreach($payment_methods as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('payment_method_id') ? old('payment_method_id') : $balance->payment_method->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_status_id">{{ trans('cruds.balance.fields.payment_status') }}</label>
                            <select class="form-control select2" name="payment_status_id" id="payment_status_id">
                                @foreach($payment_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('payment_status_id') ? old('payment_status_id') : $balance->payment_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.balance.fields.payment_status_helper') }}</span>
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