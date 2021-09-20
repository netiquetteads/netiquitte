@extends('layouts.admin')
@section('content')
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
<script>
    $( document ).ready( function() {
				CKEDITOR.config.allowedContent = true;
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
        {{ trans('global.create') }} {{ trans('cruds.template.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.templates.store") }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">{{ trans('cruds.template.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', @$_GET['TemplateName']) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_subject">{{ trans('cruds.template.fields.email_subject') }}</label>
                <input class="form-control {{ $errors->has('email_subject') ? 'is-invalid' : '' }}" type="text" name="email_subject" id="email_subject" value="{{ old('email_subject', @$_GET['EmailSubject']) }}">
                @if($errors->has('email_subject'))
                    <span class="text-danger">{{ $errors->first('email_subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.email_subject_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="from_name">{{ trans('cruds.template.fields.from_name') }}</label>
                <input class="form-control {{ $errors->has('from_name') ? 'is-invalid' : '' }}" type="text" name="from_name" id="from_name" value="{{ old('from_name', '') }}">
                @if($errors->has('from_name'))
                    <span class="text-danger">{{ $errors->first('from_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.from_name_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="from_email">{{ trans('cruds.template.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="email" name="from_email" id="from_email" value="{{ old('from_email', @$_GET['FromEmail']) }}">
                @if($errors->has('from_email'))
                    <span class="text-danger">{{ $errors->first('from_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
              <label for="offer_selection_id">{{ trans('cruds.template.fields.offer_selection') }}</label>
              <select class="form-control select2 {{ $errors->has('offer_selection') ? 'is-invalid' : '' }}" name="offer_selection_id[]" id="offer_selection_id" multiple data-placeholder="Choose offers..">
                @php
                    $getOffers=array();
                        if(@$_GET['OfferSelection']){
                            $getOffers=explode(',',$_GET['OfferSelection']);
                        }
                    @endphp
                @foreach($offer_selections as $id => $entry)
                      <option value="{{ $id }}" @if (in_array($id,$getOffers))
                      selected
                  @endif>{{ $entry }}</option>
                  @endforeach
              </select>
              @if($errors->has('offer_selection'))
                  <span class="text-danger">{{ $errors->first('offer_selection') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.template.fields.offer_selection_helper') }}</span>

              <br/><br/>
                <button type="button" onclick="LoadOffers()" class="btn btn-primary">Load Offers</button><br/>
                <br/>

          </div>
          <script>
            function LoadOffers(){
                var TemplateName = document.getElementById("name").value;
                var FromEmail = document.getElementById("from_email").value;
                var EmailSubject = document.getElementById("email_subject").value;
                var OffersSelection = $("#offer_selection_id").val();
                var data = CKEDITOR.instances.editor1.getData();
                var data2 = encodeURIComponent(data);
                            
                window.location.replace("{{ route('admin.templates.create') }}?FromEmail="+FromEmail+"&EmailSubject="+EmailSubject+"&OfferSelection="+OffersSelection+"&TemplateName="+TemplateName);
                    
            }
            </script>
          <div class="form-group">
            <label onclick="vph();"><font color="blue"><u>View Placeholders</u></font></label>
            <script>
                function vph() {
				var x = document.getElementById("placeholders");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
			}
            </script>
            <div id="placeholders" style="display:none;">
				<table>
					<tr>
						<td>ID</td>
						<td>{ID}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Placeholder</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td>{FirstName}</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>{LastName}</td>
					</tr>
					{{-- <tr>
						<td>Offer Section</td>
						<td>{Offers_Here}</td>
					</tr> --}}
					<tr>
						<td>Offer Image</td>
						<td>{Offers_Image}</td>
					</tr>
					<tr>
						<td>Company</td>
						<td>{Company}</td>
					</tr>
				</table>
			</div>
        </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.template.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="editor1">
                
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td><img alt="" src="https://www.netiquetteads.com/assets/mail/netiquette-white-coverphoto-01.jpg" style="width: 450px; height: 100px;" /></td>
		</tr>
	</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<p>Hey&nbsp;{FirstName}</p>
			</td>
		</tr>
		<tr>
			<td>
			<p>write content here</p>
			</td>
		</tr>
	</tbody>
</table>

@if ($selectedOffers)
<table align='center' border='0' cellpadding='1' cellspacing='1' style='width:500px;'>
<tbody>	
@foreach($selectedOffers as $ID => $selectedOffer)
@php
    if($selectedOffer->payout_type == "cpa"){
        $RevenueFigure = "$";
        $payout = $RevenueFigure . $selectedOffer->payout_amount;
    }else{
        $RevenueFigure = "%";
        $payout = $selectedOffer->payout_amount . $RevenueFigure;
    }
@endphp
<tr>
  <td><p><span style='font-size:26px;'><strong>{{ $selectedOffer->name }}</strong></span></p>
  <span style='border-radius:3px;display:inline-block;font-size:12px;font-weight:bold;line-height:14px;color:#white;white-space:nowrap;
  vertical-align:baseline;background-color:#E81D26;padding:2px 4px;'>
  <font color='white'>Payout: {{ $payout }}</font>
  </span>
  <br>
  <span style='color:#white;font-size:12px;'>
  <strong>Offer Id</strong>: {{ $selectedOffer->network_offer }}<br />
  <strong>Description</strong>: {{ nl2br($selectedOffer->description) }}<br /><br>
  <strong>Category</strong>: {{ $selectedOffer->category }}<br />
  <strong>Countries Accepted:</strong>  {{ $selectedOffer->countries }}
  </span>
  <br><br>
<a href='{{ $selectedOffer->preview_url }}' style='color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;'>Preview</a> 
<a href='https://netiquetteads.everflowclient.io/login' style='color:#FFFFFF;text-decoration:none;display:inline-block;margin-bottom:0;font-size:13px;line-height:20px;text-align:center;vertical-align:middle;border-radius:3px;background:linear-gradient(to bottom, #4e73df 0%, #4e73df 100%);padding:4px 12px;border: 1px solid #aaaaaa;'>Get Links</a>
<br><br>
</td>
</tr>
@endforeach
</tbody>
</table>
@endif

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
	</tbody>
</table>

<p>&nbsp;<br />
&nbsp;</p>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<center><img alt="" src="https://www.netiquetteads.com/assets/mail/staytuned.JPG" /></center>
			</td>
		</tr>
	</tbody>
</table>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px;">
	<tbody>
		<tr>
			<td>
			<center><a href="https://www.facebook.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_fb.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://www.instagram.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_ig.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://www.linkedin.com/company/netiquette-ads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_linkedin.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
			<td>
			<center><a href="https://twitter.com/netiquetteads"><img alt="" src="https://www.netiquetteads.com/assets/mail/v2_twitter.png" style="width: 50px; height: 50px;" /></a></center>
			</td>
		</tr>
	</tbody>
</table>

<p style="text-align: center;">If you no longer wish to receive our emails, please <a href="{{ route('unsubscribe') }}?id={ID}&amp;type={AcctType}">unsubscribe here</a><br />
690 A West Montrose Street, Clermont FL, USA, 34711<br />
Email us&nbsp;<a href="mailto:info@netiquetteads.com">info@netiquetteads.com</a></p>
                </textarea>
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