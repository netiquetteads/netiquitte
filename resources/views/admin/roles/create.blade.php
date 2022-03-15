@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">

                    <span class="btn btn-info btn-xs select-all-access" style="border-radius: 0">Access</span>
                    <span class="btn btn-info btn-xs select-all-create" style="border-radius: 0">Create</span>
                    <span class="btn btn-info btn-xs select-all-edit" style="border-radius: 0">Edit</span>
                    <span class="btn btn-info btn-xs select-all-show" style="border-radius: 0">Show</span>
                    <span class="btn btn-danger btn-xs select-all-delete" style="border-radius: 0">Delete</span>

                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <span class="text-danger">{{ $errors->first('permissions') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection