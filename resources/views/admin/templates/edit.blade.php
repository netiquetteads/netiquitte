@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.template.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.templates.update", [$template->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.template.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $template->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_subject">{{ trans('cruds.template.fields.email_subject') }}</label>
                <input class="form-control {{ $errors->has('email_subject') ? 'is-invalid' : '' }}" type="text" name="email_subject" id="email_subject" value="{{ old('email_subject', $template->email_subject) }}">
                @if($errors->has('email_subject'))
                    <span class="text-danger">{{ $errors->first('email_subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.email_subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_email">{{ trans('cruds.template.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="email" name="from_email" id="from_email" value="{{ old('from_email', $template->from_email) }}">
                @if($errors->has('from_email'))
                    <span class="text-danger">{{ $errors->first('from_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.template.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $template->content) !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="offer_image">{{ trans('cruds.template.fields.offer_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('offer_image') ? 'is-invalid' : '' }}" id="offer_image-dropzone">
                </div>
                @if($errors->has('offer_image'))
                    <span class="text-danger">{{ $errors->first('offer_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.offer_image_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.templates.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $template->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.offerImageDropzone = {
    url: '{{ route('admin.templates.storeMedia') }}',
    maxFilesize: 15, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="offer_image"]').remove()
      $('form').append('<input type="hidden" name="offer_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="offer_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($template) && $template->offer_image)
      var file = {!! json_encode($template->offer_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="offer_image" value="' + file.file_name + '">')
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