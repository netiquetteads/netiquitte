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
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.featured_image') }}
                        </th>
                        <td>
                            @if($account->featured_image)
                                <a href="{{ $account->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $account->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_manager_name') }}
                        </th>
                        <td>
                            {{ $account->account_manager_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_executive_name') }}
                        </th>
                        <td>
                            {{ $account->account_executive_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.balance') }}
                        </th>
                        <td>
                            {{ $account->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.last_login') }}
                        </th>
                        <td>
                            {{ $account->last_login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.network_country_code') }}
                        </th>
                        <td>
                            {{ $account->network_country_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.global_tracking_domain_url') }}
                        </th>
                        <td>
                            {{ $account->global_tracking_domain_url }}
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
                            {{ trans('cruds.account.fields.today_revenue') }}
                        </th>
                        <td>
                            {{ $account->today_revenue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.network_affiliateid') }}
                        </th>
                        <td>
                            {{ $account->network_affiliateid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_executiveid') }}
                        </th>
                        <td>
                            {{ $account->account_executiveid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_managerid') }}
                        </th>
                        <td>
                            {{ $account->account_managerid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.networkid') }}
                        </th>
                        <td>
                            {{ $account->networkid }}
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