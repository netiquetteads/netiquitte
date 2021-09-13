@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="subscriber_id">{{ trans('cruds.subscription.fields.subscriber') }}</label>
                <select class="form-control select2 {{ $errors->has('subscriber') ? 'is-invalid' : '' }}" name="subscriber_id" id="subscriber_id">
                    @foreach($subscribers as $id => $entry)
                        <option value="{{ $id }}" {{ old('subscriber_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subscriber'))
                    <span class="text-danger">{{ $errors->first('subscriber') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.subscriber_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_subscription_id">{{ trans('cruds.subscription.fields.offer_subscription') }}</label>
                <select class="form-control select2 {{ $errors->has('offer_subscription') ? 'is-invalid' : '' }}" name="offer_subscription_id" id="offer_subscription_id">
                    @foreach($offer_subscriptions as $id => $entry)
                        <option value="{{ $id }}" {{ old('offer_subscription_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer_subscription'))
                    <span class="text-danger">{{ $errors->first('offer_subscription') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.offer_subscription_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscribed_date">{{ trans('cruds.subscription.fields.subscribed_date') }}</label>
                <input class="form-control date {{ $errors->has('subscribed_date') ? 'is-invalid' : '' }}" type="text" name="subscribed_date" id="subscribed_date" value="{{ old('subscribed_date') }}">
                @if($errors->has('subscribed_date'))
                    <span class="text-danger">{{ $errors->first('subscribed_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.subscribed_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscribed_time">{{ trans('cruds.subscription.fields.subscribed_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('subscribed_time') ? 'is-invalid' : '' }}" type="text" name="subscribed_time" id="subscribed_time" value="{{ old('subscribed_time') }}">
                @if($errors->has('subscribed_time'))
                    <span class="text-danger">{{ $errors->first('subscribed_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.subscribed_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unsubscribed_date">{{ trans('cruds.subscription.fields.unsubscribed_date') }}</label>
                <input class="form-control date {{ $errors->has('unsubscribed_date') ? 'is-invalid' : '' }}" type="text" name="unsubscribed_date" id="unsubscribed_date" value="{{ old('unsubscribed_date') }}">
                @if($errors->has('unsubscribed_date'))
                    <span class="text-danger">{{ $errors->first('unsubscribed_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.unsubscribed_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unsubscribed_time">{{ trans('cruds.subscription.fields.unsubscribed_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('unsubscribed_time') ? 'is-invalid' : '' }}" type="text" name="unsubscribed_time" id="unsubscribed_time" value="{{ old('unsubscribed_time') }}">
                @if($errors->has('unsubscribed_time'))
                    <span class="text-danger">{{ $errors->first('unsubscribed_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.unsubscribed_time_helper') }}</span>
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