@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.unsubscribers.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unsubscribers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.id') }}
                        </th>
                        <td>
                            {{ $unsubscriber->id }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.company_name') }}
                        </th>
                        <td>
                            {{ $subscriber->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.first_name') }}
                        </th>
                        <td>
                            {{ $subscriber->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.last_name') }}
                        </th>
                        <td>
                            {{ $subscriber->last_name }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.unsubscribers.fields.email') }}
                        </th>
                        <td>
                            {{ $unsubscriber->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unsubscribers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection