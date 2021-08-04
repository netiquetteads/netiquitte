@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mailHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mail-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $mailHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.posted_campaign') }}
                        </th>
                        <td>
                            {{ $mailHistory->posted_campaign->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.time_sent') }}
                        </th>
                        <td>
                            {{ $mailHistory->time_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.emails_sent') }}
                        </th>
                        <td>
                            {{ $mailHistory->emails_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.list') }}
                        </th>
                        <td>
                            {{ $mailHistory->list }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.opens') }}
                        </th>
                        <td>
                            {{ $mailHistory->opens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.unopened') }}
                        </th>
                        <td>
                            {{ $mailHistory->unopened }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.email_template') }}
                        </th>
                        <td>
                            {{ $mailHistory->email_template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mailHistory.fields.campaign') }}
                        </th>
                        <td>
                            {{ $mailHistory->campaign }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mail-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection