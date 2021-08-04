@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.openedMail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.opened-mails.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">{{ trans('cruds.openedMail.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.openedMail.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open_time">{{ trans('cruds.openedMail.fields.open_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('open_time') ? 'is-invalid' : '' }}" type="text" name="open_time" id="open_time" value="{{ old('open_time') }}">
                @if($errors->has('open_time'))
                    <span class="text-danger">{{ $errors->first('open_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.openedMail.fields.open_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open_date">{{ trans('cruds.openedMail.fields.open_date') }}</label>
                <input class="form-control date {{ $errors->has('open_date') ? 'is-invalid' : '' }}" type="text" name="open_date" id="open_date" value="{{ old('open_date') }}">
                @if($errors->has('open_date'))
                    <span class="text-danger">{{ $errors->first('open_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.openedMail.fields.open_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="campaige_id">{{ trans('cruds.openedMail.fields.campaige') }}</label>
                <select class="form-control select2 {{ $errors->has('campaige') ? 'is-invalid' : '' }}" name="campaige_id" id="campaige_id">
                    @foreach($campaiges as $id => $entry)
                        <option value="{{ $id }}" {{ old('campaige_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaige'))
                    <span class="text-danger">{{ $errors->first('campaige') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.openedMail.fields.campaige_helper') }}</span>
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