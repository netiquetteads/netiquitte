@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.resultsTracking.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.results-trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.resultsTracking.fields.id') }}
                        </th>
                        <td>
                            {{ $resultsTracking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resultsTracking.fields.campaign') }}
                        </th>
                        <td>
                            {{ $resultsTracking->campaign->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resultsTracking.fields.subscriber') }}
                        </th>
                        <td>
                            {{ $resultsTracking->subscriber->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resultsTracking.fields.subscription') }}
                        </th>
                        <td>
                            {{ $resultsTracking->subscription->subscribed_date ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.results-trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection