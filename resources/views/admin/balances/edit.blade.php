@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.balance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.balances.update", [$balance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="revenue">{{ trans('cruds.balance.fields.revenue') }}</label>
                <input class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}" type="number" name="revenue" id="revenue" value="{{ old('revenue', $balance->revenue) }}" step="0.01">
                @if($errors->has('revenue'))
                    <span class="text-danger">{{ $errors->first('revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout">{{ trans('cruds.balance.fields.payout') }}</label>
                <input class="form-control {{ $errors->has('payout') ? 'is-invalid' : '' }}" type="number" name="payout" id="payout" value="{{ old('payout', $balance->payout) }}" step="0.01">
                @if($errors->has('payout'))
                    <span class="text-danger">{{ $errors->first('payout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.payout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profit">{{ trans('cruds.balance.fields.profit') }}</label>
                <input class="form-control {{ $errors->has('profit') ? 'is-invalid' : '' }}" type="number" name="profit" id="profit" value="{{ old('profit', $balance->profit) }}" step="0.01">
                @if($errors->has('profit'))
                    <span class="text-danger">{{ $errors->first('profit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.balance.fields.profit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="publisher_notes">{{ trans('cruds.balance.fields.publisher_notes') }}</label>
                <textarea class="form-control {{ $errors->has('publisher_notes') ? 'is-invalid' : '' }}" name="publisher_notes" id="publisher_notes">{{ old('publisher_notes', $balance->publisher_notes) }}</textarea>
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