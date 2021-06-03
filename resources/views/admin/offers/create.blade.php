@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.offer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.offer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="preview_url">{{ trans('cruds.offer.fields.preview_url') }}</label>
                <input class="form-control {{ $errors->has('preview_url') ? 'is-invalid' : '' }}" type="text" name="preview_url" id="preview_url" value="{{ old('preview_url', '') }}">
                @if($errors->has('preview_url'))
                    <span class="text-danger">{{ $errors->first('preview_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.preview_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.offer.fields.source') }}</label>
                <select class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" name="source" id="source">
                    <option value disabled {{ old('source', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Offer::SOURCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('source', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('source'))
                    <span class="text-danger">{{ $errors->first('source') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout">{{ trans('cruds.offer.fields.payout') }}</label>
                <input class="form-control {{ $errors->has('payout') ? 'is-invalid' : '' }}" type="number" name="payout" id="payout" value="{{ old('payout', '00.00') }}" step="0.01">
                @if($errors->has('payout'))
                    <span class="text-danger">{{ $errors->first('payout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.payout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revenue">{{ trans('cruds.offer.fields.revenue') }}</label>
                <input class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}" type="number" name="revenue" id="revenue" value="{{ old('revenue', '00.00') }}" step="0.01">
                @if($errors->has('revenue'))
                    <span class="text-danger">{{ $errors->first('revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.offer.fields.offer_status') }}</label>
                <select class="form-control {{ $errors->has('offer_status') ? 'is-invalid' : '' }}" name="offer_status" id="offer_status">
                    <option value disabled {{ old('offer_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Offer::OFFER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('offer_status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer_status'))
                    <span class="text-danger">{{ $errors->first('offer_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.offer_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="margin">{{ trans('cruds.offer.fields.margin') }}</label>
                <input class="form-control {{ $errors->has('margin') ? 'is-invalid' : '' }}" type="number" name="margin" id="margin" value="{{ old('margin', '00.00') }}" step="0.01">
                @if($errors->has('margin'))
                    <span class="text-danger">{{ $errors->first('margin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.margin_helper') }}</span>
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