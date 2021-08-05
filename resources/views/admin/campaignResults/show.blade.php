@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.campaignResult.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaign-results.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.id') }}
                        </th>
                        <td>
                            {{ $campaignResult->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.campaign') }}
                        </th>
                        <td>
                            {{ $campaignResult->campaign->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.time_sent') }}
                        </th>
                        <td>
                            {{ $campaignResult->time_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.emails_sent') }}
                        </th>
                        <td>
                            {{ $campaignResult->emails_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.list') }}
                        </th>
                        <td>
                            {{ $campaignResult->list }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.opens') }}
                        </th>
                        <td>
                            {{ $campaignResult->opens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.unopened') }}
                        </th>
                        <td>
                            {{ $campaignResult->unopened }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaignResult.fields.email_template') }}
                        </th>
                        <td>
                            {{ $campaignResult->email_template }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaign-results.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection