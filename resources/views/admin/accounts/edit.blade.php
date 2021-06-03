@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accounts.update", [$account->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $account->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.account.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company">{{ trans('cruds.account.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $account->company) }}" required>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.account.fields.account_status') }}</label>
                <select class="form-control {{ $errors->has('account_status') ? 'is-invalid' : '' }}" name="account_status" id="account_status">
                    <option value disabled {{ old('account_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Account::ACCOUNT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('account_status', $account->account_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_status'))
                    <span class="text-danger">{{ $errors->first('account_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.account_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.account.fields.users') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $account->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <span class="text-danger">{{ $errors->first('users') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.users_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="everflow_account">{{ trans('cruds.account.fields.everflow_account') }}</label>
                <input class="form-control {{ $errors->has('everflow_account') ? 'is-invalid' : '' }}" type="text" name="everflow_account" id="everflow_account" value="{{ old('everflow_account', $account->everflow_account) }}">
                @if($errors->has('everflow_account'))
                    <span class="text-danger">{{ $errors->first('everflow_account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.everflow_account_helper') }}</span>
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