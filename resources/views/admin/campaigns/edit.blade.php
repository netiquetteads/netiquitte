@extends('layouts.admin')
@section('content')
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
<script>
    $( document ).ready( function() {
				CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.height = 600; 
        
				CKEDITOR.replace('editor1',{
					filebrowserUploadUrl: 'ckeditor/ck_upload.php',
					filebrowserUploadMethod: 'form',
				});

            // Add .js-ckeditor-enabled class to tag it as activated
            $('#editor1').addClass('editor1-enabled');
		});
</script>
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
      <div class="form-group">
        <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
        <form method="POST" action="{{ route("admin.campaigns.update", [$campaign->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
          <div class="form-group">
              <label for="selected_template_id">{{ trans('cruds.campaign.fields.selected_template') }}</label>
              <select class="form-control select2 {{ $errors->has('selected_template') ? 'is-invalid' : '' }}" name="selected_template_id" id="selected_template_id">
                  @foreach($selected_templates as $id => $entry)
                      <option value="{{ $id }}" {{ (old('selected_template_id') ? old('selected_template_id') : $campaign->selected_template->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                  @endforeach
              </select>
              @if($errors->has('selected_template'))
                  <span class="text-danger">{{ $errors->first('selected_template') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.campaign.fields.selected_template_helper') }}</span>
          </div>
         
            <div class="form-group">
                <label for="name">{{ trans('cruds.campaign.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $campaign->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_subject">{{ trans('cruds.campaign.fields.email_subject') }}</label>
                <input class="form-control {{ $errors->has('email_subject') ? 'is-invalid' : '' }}" type="text" name="email_subject" id="email_subject" value="{{ old('email_subject', $campaign->email_subject) }}">
                @if($errors->has('email_subject'))
                    <span class="text-danger">{{ $errors->first('email_subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.email_subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_email">{{ trans('cruds.campaign.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="email" name="from_email" id="from_email" value="{{ old('from_email', $campaign->from_email) }}">
                @if($errors->has('from_email'))
                    <span class="text-danger">{{ $errors->first('from_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
              <label for="campaign_offer_id">{{ trans('cruds.campaign.fields.campaign_offer') }}</label>
              <select class="form-control select2 {{ $errors->has('campaign_offer') ? 'is-invalid' : '' }}" name="campaign_offer_id[]" id="campaign_offer_id" multiple data-placeholder="Choose offers..">
                  @foreach($campaign_offers as $id => $entry)
                      <option value="{{ $id }}" @if (in_array($id,$campaign->campaignOffers->pluck('id')->toArray()))
                        selected
                    @endif>{{ $entry }}</option>
                  @endforeach
              </select>
              @if($errors->has('campaign_offer'))
                  <span class="text-danger">{{ $errors->first('campaign_offer') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.campaign.fields.campaign_offer_helper') }}</span>
          </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.campaign.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="editor1">{!! old('content', $campaign->content) !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.content_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="offer_image">{{ trans('cruds.campaign.fields.offer_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('offer_image') ? 'is-invalid' : '' }}" id="offer_image-dropzone">
                </div>
                @if($errors->has('offer_image'))
                    <span class="text-danger">{{ $errors->first('offer_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.offer_image_helper') }}</span>
            </div> --}}
            
            {{-- <div class="form-group">
                <label for="subs">{{ trans('cruds.campaign.fields.subs') }}</label>
                <input class="form-control {{ $errors->has('subs') ? 'is-invalid' : '' }}" type="number" name="subs" id="subs" value="{{ old('subs', $campaign->subs) }}" step="1">
                @if($errors->has('subs'))
                    <span class="text-danger">{{ $errors->first('subs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.subs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unsubs">{{ trans('cruds.campaign.fields.unsubs') }}</label>
                <input class="form-control {{ $errors->has('unsubs') ? 'is-invalid' : '' }}" type="number" name="unsubs" id="unsubs" value="{{ old('unsubs', $campaign->unsubs) }}" step="1">
                @if($errors->has('unsubs'))
                    <span class="text-danger">{{ $errors->first('unsubs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.unsubs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opens">{{ trans('cruds.campaign.fields.opens') }}</label>
                <input class="form-control {{ $errors->has('opens') ? 'is-invalid' : '' }}" type="number" name="opens" id="opens" value="{{ old('opens', $campaign->opens) }}" step="1">
                @if($errors->has('opens'))
                    <span class="text-danger">{{ $errors->first('opens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.opens_helper') }}</span>
            </div> --}}
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
                xhr.open('POST', '{{ route('admin.campaigns.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $campaign->id ?? 0 }}');
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
    url: '{{ route('admin.campaigns.storeMedia') }}',
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
@if(isset($campaign) && $campaign->offer_image)
      var file = {!! json_encode($campaign->offer_image) !!}
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