@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.user.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $user->linkedin) }}">
                @if($errors->has('linkedin'))
                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.user.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', $user->skype) }}">
                @if($errors->has('skype'))
                    <span class="text-danger">{{ $errors->first('skype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_phone">{{ trans('cruds.user.fields.work_phone') }}</label>
                <input class="form-control {{ $errors->has('work_phone') ? 'is-invalid' : '' }}" type="text" name="work_phone" id="work_phone" value="{{ old('work_phone', $user->work_phone) }}">
                @if($errors->has('work_phone'))
                    <span class="text-danger">{{ $errors->first('work_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.work_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cell_phone">{{ trans('cruds.user.fields.cell_phone') }}</label>
                <input class="form-control {{ $errors->has('cell_phone') ? 'is-invalid' : '' }}" type="text" name="cell_phone" id="cell_phone" value="{{ old('cell_phone', $user->cell_phone) }}">
                @if($errors->has('cell_phone'))
                    <span class="text-danger">{{ $errors->first('cell_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.cell_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instant_messaginid">{{ trans('cruds.user.fields.instant_messaginid') }}</label>
                <input class="form-control {{ $errors->has('instant_messaginid') ? 'is-invalid' : '' }}" type="number" name="instant_messaginid" id="instant_messaginid" value="{{ old('instant_messaginid', $user->instant_messaginid) }}" step="1">
                @if($errors->has('instant_messaginid'))
                    <span class="text-danger">{{ $errors->first('instant_messaginid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.instant_messaginid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instant_messaging_identifier">{{ trans('cruds.user.fields.instant_messaging_identifier') }}</label>
                <input class="form-control {{ $errors->has('instant_messaging_identifier') ? 'is-invalid' : '' }}" type="text" name="instant_messaging_identifier" id="instant_messaging_identifier" value="{{ old('instant_messaging_identifier', $user->instant_messaging_identifier) }}">
                @if($errors->has('instant_messaging_identifier'))
                    <span class="text-danger">{{ $errors->first('instant_messaging_identifier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.instant_messaging_identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="labels">{{ trans('cruds.user.fields.labels') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('labels') ? 'is-invalid' : '' }}" name="labels[]" id="labels" multiple>
                    @foreach($labels as $id => $labels)
                        <option value="{{ $id }}" {{ (in_array($id, old('labels', [])) || $user->labels->contains($id)) ? 'selected' : '' }}>{{ $labels }}</option>
                    @endforeach
                </select>
                @if($errors->has('labels'))
                    <span class="text-danger">{{ $errors->first('labels') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.labels_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id">
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $user->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <span class="text-danger">{{ $errors->first('team') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1024,
      height: 1024
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->photo)
      var file = {!! json_encode($user->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection