@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.label.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.labels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.label.fields.id') }}
                        </th>
                        <td>
                            {{ $label->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.label.fields.name') }}
                        </th>
                        <td>
                            {{ $label->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.labels.index') }}">
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
            <a class="nav-link" href="#labels_affiliates" role="tab" data-toggle="tab">
                {{ trans('cruds.affiliate.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="labels_affiliates">
            @includeIf('admin.labels.relationships.labelsAffiliates', ['affiliates' => $label->labelsAffiliates])
        </div>
    </div>
</div>

@endsection