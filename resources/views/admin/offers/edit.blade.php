@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.offer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offers.update", [$offer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.offer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $offer->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="preview_url">{{ trans('cruds.offer.fields.preview_url') }}</label>
                <input class="form-control {{ $errors->has('preview_url') ? 'is-invalid' : '' }}" type="text" name="preview_url" id="preview_url" value="{{ old('preview_url', $offer->preview_url) }}">
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
                        <option value="{{ $key }}" {{ old('source', $offer->source) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('source'))
                    <span class="text-danger">{{ $errors->first('source') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout">{{ trans('cruds.offer.fields.payout') }}</label>
                <input class="form-control {{ $errors->has('payout') ? 'is-invalid' : '' }}" type="number" name="payout" id="payout" value="{{ old('payout', $offer->payout) }}" step="0.01">
                @if($errors->has('payout'))
                    <span class="text-danger">{{ $errors->first('payout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.payout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revenue">{{ trans('cruds.offer.fields.revenue') }}</label>
                <input class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}" type="number" name="revenue" id="revenue" value="{{ old('revenue', $offer->revenue) }}" step="0.01">
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
                        <option value="{{ $key }}" {{ old('offer_status', $offer->offer_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer_status'))
                    <span class="text-danger">{{ $errors->first('offer_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.offer_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="margin">{{ trans('cruds.offer.fields.margin') }}</label>
                <input class="form-control {{ $errors->has('margin') ? 'is-invalid' : '' }}" type="number" name="margin" id="margin" value="{{ old('margin', $offer->margin) }}" step="0.01">
                @if($errors->has('margin'))
                    <span class="text-danger">{{ $errors->first('margin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.margin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="affiliate_id">{{ trans('cruds.offer.fields.affiliate') }}</label>
                <select class="form-control select2 {{ $errors->has('affiliate') ? 'is-invalid' : '' }}" name="affiliate_id" id="affiliate_id">
                    @foreach($affiliates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('affiliate_id') ? old('affiliate_id') : $offer->affiliate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('affiliate'))
                    <span class="text-danger">{{ $errors->first('affiliate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.affiliate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_offer">{{ trans('cruds.offer.fields.network_offer') }}</label>
                <input class="form-control {{ $errors->has('network_offer') ? 'is-invalid' : '' }}" type="number" name="network_offer" id="network_offer" value="{{ old('network_offer', $offer->network_offer) }}" step="1">
                @if($errors->has('network_offer'))
                    <span class="text-danger">{{ $errors->first('network_offer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.network_offer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network">{{ trans('cruds.offer.fields.network') }}</label>
                <input class="form-control {{ $errors->has('network') ? 'is-invalid' : '' }}" type="number" name="network" id="network" value="{{ old('network', $offer->network) }}" step="1">
                @if($errors->has('network'))
                    <span class="text-danger">{{ $errors->first('network') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.network_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="optimized_thumbnail_url">{{ trans('cruds.offer.fields.optimized_thumbnail_url') }}</label>
                <input class="form-control {{ $errors->has('optimized_thumbnail_url') ? 'is-invalid' : '' }}" type="text" name="optimized_thumbnail_url" id="optimized_thumbnail_url" value="{{ old('optimized_thumbnail_url', $offer->optimized_thumbnail_url) }}">
                @if($errors->has('optimized_thumbnail_url'))
                    <span class="text-danger">{{ $errors->first('optimized_thumbnail_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.optimized_thumbnail_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thumbnail_url">{{ trans('cruds.offer.fields.thumbnail_url') }}</label>
                <input class="form-control {{ $errors->has('thumbnail_url') ? 'is-invalid' : '' }}" type="text" name="thumbnail_url" id="thumbnail_url" value="{{ old('thumbnail_url', $offer->thumbnail_url) }}">
                @if($errors->has('thumbnail_url'))
                    <span class="text-danger">{{ $errors->first('thumbnail_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.thumbnail_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visibility">{{ trans('cruds.offer.fields.visibility') }}</label>
                <input class="form-control {{ $errors->has('visibility') ? 'is-invalid' : '' }}" type="text" name="visibility" id="visibility" value="{{ old('visibility', $offer->visibility) }}">
                @if($errors->has('visibility'))
                    <span class="text-danger">{{ $errors->first('visibility') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.visibility_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_advertiser_name">{{ trans('cruds.offer.fields.network_advertiser_name') }}</label>
                <input class="form-control {{ $errors->has('network_advertiser_name') ? 'is-invalid' : '' }}" type="text" name="network_advertiser_name" id="network_advertiser_name" value="{{ old('network_advertiser_name', $offer->network_advertiser_name) }}">
                @if($errors->has('network_advertiser_name'))
                    <span class="text-danger">{{ $errors->first('network_advertiser_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.network_advertiser_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.offer.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', $offer->category) }}">
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_offer_group">{{ trans('cruds.offer.fields.network_offer_group') }}</label>
                <input class="form-control {{ $errors->has('network_offer_group') ? 'is-invalid' : '' }}" type="number" name="network_offer_group" id="network_offer_group" value="{{ old('network_offer_group', $offer->network_offer_group) }}" step="1">
                @if($errors->has('network_offer_group'))
                    <span class="text-danger">{{ $errors->first('network_offer_group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.network_offer_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_created">{{ trans('cruds.offer.fields.time_created') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_created') ? 'is-invalid' : '' }}" type="text" name="time_created" id="time_created" value="{{ old('time_created', $offer->time_created) }}">
                @if($errors->has('time_created'))
                    <span class="text-danger">{{ $errors->first('time_created') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.time_created_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_saved">{{ trans('cruds.offer.fields.time_saved') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_saved') ? 'is-invalid' : '' }}" type="text" name="time_saved" id="time_saved" value="{{ old('time_saved', $offer->time_saved) }}">
                @if($errors->has('time_saved'))
                    <span class="text-danger">{{ $errors->first('time_saved') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.time_saved_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="today_revenue">{{ trans('cruds.offer.fields.today_revenue') }}</label>
                <input class="form-control {{ $errors->has('today_revenue') ? 'is-invalid' : '' }}" type="number" name="today_revenue" id="today_revenue" value="{{ old('today_revenue', $offer->today_revenue) }}" step="0.01">
                @if($errors->has('today_revenue'))
                    <span class="text-danger">{{ $errors->first('today_revenue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.today_revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destination_url">{{ trans('cruds.offer.fields.destination_url') }}</label>
                <input class="form-control {{ $errors->has('destination_url') ? 'is-invalid' : '' }}" type="text" name="destination_url" id="destination_url" value="{{ old('destination_url', $offer->destination_url) }}">
                @if($errors->has('destination_url'))
                    <span class="text-danger">{{ $errors->first('destination_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.destination_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="today_clicks">{{ trans('cruds.offer.fields.today_clicks') }}</label>
                <input class="form-control {{ $errors->has('today_clicks') ? 'is-invalid' : '' }}" type="number" name="today_clicks" id="today_clicks" value="{{ old('today_clicks', $offer->today_clicks) }}" step="1">
                @if($errors->has('today_clicks'))
                    <span class="text-danger">{{ $errors->first('today_clicks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.today_clicks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revenue_type">{{ trans('cruds.offer.fields.revenue_type') }}</label>
                <input class="form-control {{ $errors->has('revenue_type') ? 'is-invalid' : '' }}" type="text" name="revenue_type" id="revenue_type" value="{{ old('revenue_type', $offer->revenue_type) }}">
                @if($errors->has('revenue_type'))
                    <span class="text-danger">{{ $errors->first('revenue_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.revenue_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout_type">{{ trans('cruds.offer.fields.payout_type') }}</label>
                <input class="form-control {{ $errors->has('payout_type') ? 'is-invalid' : '' }}" type="text" name="payout_type" id="payout_type" value="{{ old('payout_type', $offer->payout_type) }}">
                @if($errors->has('payout_type'))
                    <span class="text-danger">{{ $errors->first('payout_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.payout_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="today_payout_amount">{{ trans('cruds.offer.fields.today_payout_amount') }}</label>
                <input class="form-control {{ $errors->has('today_payout_amount') ? 'is-invalid' : '' }}" type="number" name="today_payout_amount" id="today_payout_amount" value="{{ old('today_payout_amount', $offer->today_payout_amount) }}" step="0.01">
                @if($errors->has('today_payout_amount'))
                    <span class="text-danger">{{ $errors->first('today_payout_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.today_payout_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="today_revenue_amount">{{ trans('cruds.offer.fields.today_revenue_amount') }}</label>
                <input class="form-control {{ $errors->has('today_revenue_amount') ? 'is-invalid' : '' }}" type="number" name="today_revenue_amount" id="today_revenue_amount" value="{{ old('today_revenue_amount', $offer->today_revenue_amount) }}" step="0.01">
                @if($errors->has('today_revenue_amount'))
                    <span class="text-danger">{{ $errors->first('today_revenue_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.today_revenue_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout_amount">{{ trans('cruds.offer.fields.payout_amount') }}</label>
                <input class="form-control {{ $errors->has('payout_amount') ? 'is-invalid' : '' }}" type="number" name="payout_amount" id="payout_amount" value="{{ old('payout_amount', $offer->payout_amount) }}" step="1">
                @if($errors->has('payout_amount'))
                    <span class="text-danger">{{ $errors->first('payout_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.payout_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="revenue_amount">{{ trans('cruds.offer.fields.revenue_amount') }}</label>
                <input class="form-control {{ $errors->has('revenue_amount') ? 'is-invalid' : '' }}" type="number" name="revenue_amount" id="revenue_amount" value="{{ old('revenue_amount', $offer->revenue_amount) }}" step="1">
                @if($errors->has('revenue_amount'))
                    <span class="text-danger">{{ $errors->first('revenue_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.revenue_amount_helper') }}</span>
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