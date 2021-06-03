@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.account.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.id') }}
                        </th>
                        <td>
                            {{ $account->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $account->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.company') }}
                        </th>
                        <td>
                            {{ $account->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_status') }}
                        </th>
                        <td>
                            {{ App\Models\Account::ACCOUNT_STATUS_SELECT[$account->account_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.users') }}
                        </th>
                        <td>
                            @foreach($account->users as $key => $users)
                                <span class="label label-info">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.created_at') }}
                        </th>
                        <td>
                            {{ $account->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.everflow_account') }}
                        </th>
                        <td>
                            {{ $account->everflow_account }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection