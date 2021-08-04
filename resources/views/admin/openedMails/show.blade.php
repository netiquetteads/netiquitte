@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.openedMail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opened-mails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.openedMail.fields.id') }}
                        </th>
                        <td>
                            {{ $openedMail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openedMail.fields.email') }}
                        </th>
                        <td>
                            {{ $openedMail->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openedMail.fields.open_time') }}
                        </th>
                        <td>
                            {{ $openedMail->open_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openedMail.fields.open_date') }}
                        </th>
                        <td>
                            {{ $openedMail->open_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.openedMail.fields.campaige') }}
                        </th>
                        <td>
                            {{ $openedMail->campaige->campaign ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opened-mails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection