@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.template.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.id') }}
                        </th>
                        <td>
                            {{ $template->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.name') }}
                        </th>
                        <td>
                            {{ $template->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.email_subject') }}
                        </th>
                        <td>
                            {{ $template->email_subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.from_email') }}
                        </th>
                        <td>
                            {{ $template->from_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.content') }}
                        </th>
                        <td>
                            {!! $template->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.template.fields.offer_image') }}
                        </th>
                        <td>
                            @if($template->offer_image)
                                <a href="{{ $template->offer_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $template->offer_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.templates.index') }}">
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
            <a class="nav-link" href="#template_mail_rooms" role="tab" data-toggle="tab">
                {{ trans('cruds.mailRoom.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="template_mail_rooms">
            @includeIf('admin.templates.relationships.templateMailRooms', ['mailRooms' => $template->templateMailRooms])
        </div>
    </div>
</div>

@endsection