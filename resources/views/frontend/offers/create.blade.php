@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.offer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.offers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.offer.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="preview_url">{{ trans('cruds.offer.fields.preview_url') }}</label>
                            <input class="form-control" type="text" name="preview_url" id="preview_url" value="{{ old('preview_url', '') }}">
                            @if($errors->has('preview_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('preview_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.preview_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.offer.fields.source') }}</label>
                            <select class="form-control" name="source" id="source">
                                <option value disabled {{ old('source', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Offer::SOURCE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('source', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('source'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('source') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.source_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payout">{{ trans('cruds.offer.fields.payout') }}</label>
                            <input class="form-control" type="number" name="payout" id="payout" value="{{ old('payout', '00.00') }}" step="0.01">
                            @if($errors->has('payout'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payout') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.payout_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="revenue">{{ trans('cruds.offer.fields.revenue') }}</label>
                            <input class="form-control" type="number" name="revenue" id="revenue" value="{{ old('revenue', '00.00') }}" step="0.01">
                            @if($errors->has('revenue'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('revenue') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.revenue_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.offer.fields.offer_status') }}</label>
                            <select class="form-control" name="offer_status" id="offer_status">
                                <option value disabled {{ old('offer_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Offer::OFFER_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('offer_status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('offer_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('offer_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.offer_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="margin">{{ trans('cruds.offer.fields.margin') }}</label>
                            <input class="form-control" type="number" name="margin" id="margin" value="{{ old('margin', '00.00') }}" step="0.01">
                            @if($errors->has('margin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('margin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.margin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="affiliate_id">{{ trans('cruds.offer.fields.affiliate') }}</label>
                            <select class="form-control select2" name="affiliate_id" id="affiliate_id">
                                @foreach($affiliates as $id => $entry)
                                    <option value="{{ $id }}" {{ old('affiliate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('affiliate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('affiliate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.offer.fields.affiliate_helper') }}</span>
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