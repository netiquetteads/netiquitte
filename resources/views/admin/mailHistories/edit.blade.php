@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mailHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mail-histories.update", [$mailHistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="posted_campaign_id">{{ trans('cruds.mailHistory.fields.posted_campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('posted_campaign') ? 'is-invalid' : '' }}" name="posted_campaign_id" id="posted_campaign_id">
                    @foreach($posted_campaigns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('posted_campaign_id') ? old('posted_campaign_id') : $mailHistory->posted_campaign->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('posted_campaign'))
                    <span class="text-danger">{{ $errors->first('posted_campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.posted_campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_sent">{{ trans('cruds.mailHistory.fields.time_sent') }}</label>
                <input class="form-control datetime {{ $errors->has('time_sent') ? 'is-invalid' : '' }}" type="text" name="time_sent" id="time_sent" value="{{ old('time_sent', $mailHistory->time_sent) }}">
                @if($errors->has('time_sent'))
                    <span class="text-danger">{{ $errors->first('time_sent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.time_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="emails_sent">{{ trans('cruds.mailHistory.fields.emails_sent') }}</label>
                <input class="form-control {{ $errors->has('emails_sent') ? 'is-invalid' : '' }}" type="number" name="emails_sent" id="emails_sent" value="{{ old('emails_sent', $mailHistory->emails_sent) }}" step="1">
                @if($errors->has('emails_sent'))
                    <span class="text-danger">{{ $errors->first('emails_sent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.emails_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="list">{{ trans('cruds.mailHistory.fields.list') }}</label>
                <input class="form-control {{ $errors->has('list') ? 'is-invalid' : '' }}" type="text" name="list" id="list" value="{{ old('list', $mailHistory->list) }}">
                @if($errors->has('list'))
                    <span class="text-danger">{{ $errors->first('list') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.list_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opens">{{ trans('cruds.mailHistory.fields.opens') }}</label>
                <input class="form-control {{ $errors->has('opens') ? 'is-invalid' : '' }}" type="number" name="opens" id="opens" value="{{ old('opens', $mailHistory->opens) }}" step="1">
                @if($errors->has('opens'))
                    <span class="text-danger">{{ $errors->first('opens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.opens_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unopened">{{ trans('cruds.mailHistory.fields.unopened') }}</label>
                <input class="form-control {{ $errors->has('unopened') ? 'is-invalid' : '' }}" type="number" name="unopened" id="unopened" value="{{ old('unopened', $mailHistory->unopened) }}" step="1">
                @if($errors->has('unopened'))
                    <span class="text-danger">{{ $errors->first('unopened') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.unopened_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_template">{{ trans('cruds.mailHistory.fields.email_template') }}</label>
                <textarea class="form-control {{ $errors->has('email_template') ? 'is-invalid' : '' }}" name="email_template" id="email_template">{{ old('email_template', $mailHistory->email_template) }}</textarea>
                @if($errors->has('email_template'))
                    <span class="text-danger">{{ $errors->first('email_template') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.email_template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="campaign">{{ trans('cruds.mailHistory.fields.campaign') }}</label>
                <input class="form-control {{ $errors->has('campaign') ? 'is-invalid' : '' }}" type="text" name="campaign" id="campaign" value="{{ old('campaign', $mailHistory->campaign) }}">
                @if($errors->has('campaign'))
                    <span class="text-danger">{{ $errors->first('campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mailHistory.fields.campaign_helper') }}</span>
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