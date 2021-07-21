@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.affiliate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.affiliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.id') }}
                        </th>
                        <td>
                            {{ $affiliate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.logo') }}
                        </th>
                        <td>
                            @if($affiliate->logo)
                                <a href="{{ $affiliate->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $affiliate->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.company') }}
                        </th>
                        <td>
                            {{ $affiliate->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.account_status') }}
                        </th>
                        <td>
                            {{ App\Models\Affiliate::ACCOUNT_STATUS_SELECT[$affiliate->account_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.users') }}
                        </th>
                        <td>
                            @foreach($affiliate->users as $key => $users)
                                <span class="label label-info">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.created_at') }}
                        </th>
                        <td>
                            {{ $affiliate->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.everflow_account') }}
                        </th>
                        <td>
                            {{ $affiliate->everflow_account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.featured_image') }}
                        </th>
                        <td>
                            @if($affiliate->featured_image)
                                <a href="{{ $affiliate->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $affiliate->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.account_manager_name') }}
                        </th>
                        <td>
                            {{ $affiliate->account_manager_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.account_executive_name') }}
                        </th>
                        <td>
                            {{ $affiliate->account_executive_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.balance') }}
                        </th>
                        <td>
                            {{ $affiliate->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.last_login') }}
                        </th>
                        <td>
                            {{ $affiliate->last_login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.network_country_code') }}
                        </th>
                        <td>
                            {{ $affiliate->network_country_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.global_tracking_domain_url') }}
                        </th>
                        <td>
                            {{ $affiliate->global_tracking_domain_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $affiliate->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.today_revenue') }}
                        </th>
                        <td>
                            {{ $affiliate->today_revenue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.network_affiliateid') }}
                        </th>
                        <td>
                            {{ $affiliate->network_affiliateid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.account_executiveid') }}
                        </th>
                        <td>
                            {{ $affiliate->account_executiveid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.account_managerid') }}
                        </th>
                        <td>
                            {{ $affiliate->account_managerid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.networkid') }}
                        </th>
                        <td>
                            {{ $affiliate->networkid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.labels') }}
                        </th>
                        <td>
                            @foreach($affiliate->labels as $key => $labels)
                                <span class="label label-info">{{ $labels->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.affiliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#affiliates_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="affiliates_users">
            @includeIf('admin.affiliates.relationships.affiliatesUsers', ['users' => $affiliate->affiliatesUsers])
        </div>
    </div>
</div>

@endsection