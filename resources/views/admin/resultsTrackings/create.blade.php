@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.resultsTracking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.results-trackings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="campaign_id">{{ trans('cruds.resultsTracking.fields.campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('campaign') ? 'is-invalid' : '' }}" name="campaign_id" id="campaign_id">
                    @foreach($campaigns as $id => $entry)
                        <option value="{{ $id }}" {{ old('campaign_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign'))
                    <span class="text-danger">{{ $errors->first('campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resultsTracking.fields.campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscriber_id">{{ trans('cruds.resultsTracking.fields.subscriber') }}</label>
                <select class="form-control select2 {{ $errors->has('subscriber') ? 'is-invalid' : '' }}" name="subscriber_id" id="subscriber_id">
                    @foreach($subscribers as $id => $entry)
                        <option value="{{ $id }}" {{ old('subscriber_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subscriber'))
                    <span class="text-danger">{{ $errors->first('subscriber') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resultsTracking.fields.subscriber_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscription_id">{{ trans('cruds.resultsTracking.fields.subscription') }}</label>
                <select class="form-control select2 {{ $errors->has('subscription') ? 'is-invalid' : '' }}" name="subscription_id" id="subscription_id">
                    @foreach($subscriptions as $id => $entry)
                        <option value="{{ $id }}" {{ old('subscription_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subscription'))
                    <span class="text-danger">{{ $errors->first('subscription') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.resultsTracking.fields.subscription_helper') }}</span>
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